<?php

namespace App\Http\Controllers;

use App\Models\ContentHistory;
use App\Models\Images;
use App\Models\UseCase;
use App\Models\UserDocument;
use GuzzleHttp\Client;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class OpenAiController extends Controller
{
    public function content(Request $request)
    {
        $cases = UseCase::where('is_published', 1)->pluck('title', 'id');
        return view('openAi.content', compact('cases', 'request'));
    }
    /* Open AI Content Generate */
    public function contentGenerate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'keywords' => 'required',
            'use_case' => 'required',
            'temp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Get use case prompt & replcae placeholder
            $case = UseCase::findOrFail($request->use_case);
            $placeholder = array("[keywords]", "[title]", "[description]");
            $replaceBy = array($request->keywords, $request->title, $request->description);
            $prompt = str_replace($placeholder, $replaceBy, $case->prompt);
            $temp = floatval($request->temp ?? 0.7);
            $result = OpenAI::completions()->create([
                'model' => 'text-davinci-003',
                'prompt' => $prompt,
                'temperature' => $temp,
                'max_tokens' => 2566
            ]);
            $content =  $result['choices'][0]['text'] ?? '';
            $wordCount = str_word_count($content);
            $charCount = strlen($content);
            $results = [
                'content' => $content,
                'words' => $wordCount,
                'characters' => $charCount
            ];
            ContentHistory::create([
                'title'=>$request->title,
                'keywords'=>$request->keywords,
                'description'=>$request->description,
                'temperature'=>$temp,
                'generated_content'=>$content,
                'prompt'=>$prompt,
                'use_case_id'=>$request->use_case,
                'user_id'=> Auth::user()->id
            ]);

            return response()->json($results, 200);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $errorMessage,
            ], 400);
            return response()->json($results, 200);
        }
    }
    public function image(Request $request)
    {
        $images = [];
        if (isset($request->id)) {
            $id = explode(',', $request->id);
            $images = Images::whereIn('id', $id)->where('user_id', Auth::user()->id)->get();
        }

        return view('openAi.image',compact('images'));
    }
    public function allImages(Request $request)
    {
        $images = Images::where('user_id', Auth::user()->id);
        if(isset($request->q)){
            $images = $images->where('prompt', 'like', "%$request->q%"); 
        }
        $images = $images->paginate(8);
        return view('openAi.allImages',compact('images','request'));
    }
    public function imageGenrate(Request $request)
    {
        $request->validate([
            'prompt' => 'required',
            'quantity' => 'required',
            'image_size' => 'required',
        ]);
        // Open Ai Image generate
        $response = OpenAI::images()->create([
            'prompt' => $request->prompt,
            'n' => intval($request->quantity),
            'size' => $request->image_size,
            'response_format' => 'url',
        ]);
        $imageId = [];
        foreach ($response->data as $data) {
            $image = fileUploadFromUrl($data->url, "ai_images/", '');
            $imageId[] = Images::create([
                'prompt' => $request->prompt,
                'size' => $request->image_size,
                'image_path' => $image,
                'user_id' => Auth::user()->id
            ])->id;
        }
        $id = implode(',', $imageId);
        alert()->success('Success', 'Image Generated successfully.');
        return redirect()->route('image.create', ['id' => $id]);
    }

    public function imageDelete($id)
    {
        try {
            $data = Images::findOrFail($id);
            if ($data->image_path != '' && file_exists($data->image_path)) {
                unlink($data->image_path);
            }
            $data->delete();
            alert()->success('Success', 'Image is deleted');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            alert()->error('Error', $errorMessage);
            return back();
        }
    }
    public function default()
    {
        return view('default');
    }
}
