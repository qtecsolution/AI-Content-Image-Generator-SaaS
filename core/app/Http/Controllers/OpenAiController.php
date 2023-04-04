<?php

namespace App\Http\Controllers;

use App\Models\ContentHistory;
use App\Models\Images;
use App\Models\Language;
use App\Models\Plan;
use App\Models\UseCase;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class OpenAiController extends Controller
{
    public function content(Request $request)
    {
        if (showBalance() == '') {
            myAlert('error', 'Subscribe any plan first!');
            return redirect()->route('user.purchase');
        } elseif (showBalance()->api_call == 0) {
            myAlert('error', 'Your Api call limit: 0');
            return redirect()->route('user.purchase');
        }
        $cases = UseCase::where('is_published', 1)->pluck('title', 'id');
        $inputFields = [];
        if (isset($request->case)) {
            $defaultCase = UseCase::where('id', $request->case)->first();
        } else {
            $defaultCase = UseCase::first();
        }
        if (isset($defaultCase->input_fields)) {
            $inputFields = explode(',', $defaultCase->input_fields);
        }
        $languages = Language::where('status', 1)->pluck('language', 'language');
        return view('openAi.content', compact('cases', 'request', 'inputFields', 'languages'));
    }
    /* Open AI Content Generate */
    public function contentGenerate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'use_case' => 'required',
            'temp' => 'required',
            'max_words' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Get use case prompt & generate prompt by replacing placeholder
            $case = UseCase::findOrFail($request->use_case);
            $placeholder = array("[keywords]", "[title]", "[description]", "[tone]", "[language]");
            $replaceBy = array($request->keywords ?? '', $request->title ?? '', $request->description ?? '', $request->tone, $request->language);
            $prompt = str_replace($placeholder, $replaceBy, $case->prompt);

            $temp = floatval($request->temp ?? 0.7);

            $plan = Plan::where('id', auth()->user()->plan_id)->first();
            $max_tokens = ($plan->word_count < (int)$request->max_words) ? $plan->word_count : (int)$request->max_words;
            $model = readConfig('open_ai_model');
            // Open AI API call
            $result = OpenAI::completions()->create([
                'model' => $model,
                'prompt' => $prompt,
                'temperature' => $temp,
                'max_tokens' => $max_tokens,
                'n' => (int)$request->quantity
            ]);
            $content =  $result['choices'][0]['text'] ?? '';
            $wordCount = str_word_count($content) ?? 0;
            $charCount = strlen($content) ?? 0;
            $results = [
                'content' => $content,
                'words' => $wordCount,
                'characters' => $charCount
            ];
            // Content history create
            ContentHistory::create([
                'title' => $request->title ?? '',
                'keywords' => $request->keywords ?? '',
                'description' => $request->description ?? '',
                'temperature' => $temp,
                'generated_content' => $content,
                'prompt' => $prompt,
                'use_case_id' => $request->use_case,
                'user_id' => Auth::user()->id
            ]);
            balanceDeduction('call_api');
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
    // View for generate image
    public function image(Request $request)
    {
        if (showBalance() == '') {
            myAlert('error', 'Subscribe any plan first!');
            return redirect()->route('user.purchase');
        } elseif (showBalance()->image == 0) {
            myAlert('error', 'You have reached your image generate limit');
            return redirect()->route('user.purchase');
        }
        $images = [];
        if (isset($request->id)) {
            $id = explode(',', $request->id);
            $images = Images::whereIn('id', $id)->where('user_id', Auth::user()->id)->get();
        }

        return view('openAi.image', compact('images'));
    }
    // ALL Generated Images List
    public function allImages(Request $request)
    {
        $images = Images::where('user_id', Auth::user()->id);
        if (isset($request->q)) {
            $images = $images->where('prompt', 'like', "%$request->q%");
        }
        $images = $images->latest()->paginate(12);
        return view('openAi.allImages', compact('images', 'request'));
    }
    // Generate Image
    public function imageGenerate(Request $request)
    {
        $request->validate([
            'prompt' => 'required',
            'quantity' => 'required',
            'image_size' => 'required',
        ]);
        try {
            $qty = intval($request->quantity);
            if (showBalance()->image < $qty) {
                myAlert('error', 'Your image generate limit: ' . showBalance()->image);
                return back();
            }
            $response = OpenAI::images()->create([
                'prompt' => $request->prompt,
                'n' => $qty,
                'size' => $request->image_size,
                'response_format' => 'url',
            ]);
            $imageId = [];
            if (isset($response->data)) {
                foreach ($response->data as $data) {
                    $image = fileUploadFromUrl($data->url, "ai_images/", '');
                    $imageId[] = Images::create([
                        'prompt' => $request->prompt,
                        'size' => $request->image_size,
                        'image_path' => $image,
                        'user_id' => Auth::user()->id
                    ])->id;
                }
            }
            $id = implode(',', $imageId);
            balanceDeduction('image', $qty);
            myAlert('success', 'Image Generated successfully.');
            return redirect()->route('image.create', ['id' => $id]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', "Open AI error: " . $errorMessage);
            return redirect()->back();
        }
    }
    // Image Re-Generate
    public function imageReGenerate($oldId)
    {
        try {
            if (showBalance() == '') {
                myAlert('error', 'Subscribe any plan first!');
                return redirect()->route('user.purchase');
            } elseif (showBalance()->image == 0) {
                myAlert('error', 'You have reached your image generate limit');
                return redirect()->route('user.purchase');
            }
            $oldImage = Images::where('id', $oldId)->where('user_id', Auth::user()->id)->firstOrFail();
            $response = OpenAI::images()->create([
                'prompt' => $oldImage->prompt,
                'n' => 1,
                'size' => "$oldImage->size",
                'response_format' => 'url',
            ]);
            $imageId = [$oldId];
            if (isset($response->data)) {
                foreach ($response->data as $data) {
                    $image = fileUploadFromUrl($data->url, "ai_images/", '');
                    $imageId[] = Images::create([
                        'prompt' => $oldImage->prompt,
                        'size' => $oldImage->size,
                        'image_path' => $image,
                        'user_id' => Auth::user()->id
                    ])->id;
                }
            }
            $id = implode(',', $imageId);

            balanceDeduction('image');

            myAlert('success', 'Image Generated successfully.');
            return redirect()->route('image.create', ['id' => $id]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', "Open AI error: " . $errorMessage);
            return redirect()->back();
        }
    }

    public function imageVariation(Request $request)
    {
        if (showBalance() == '') {
            myAlert('error', 'Subscribe any plan first!');
            return redirect()->route('user.purchase');
        }
        $images = [];
        if (isset($request->id)) {
            $id = explode(',', $request->id);
            $images = Images::whereIn('id', $id)->where('user_id', Auth::user()->id)->get();
        }
        return view('openAi.imageVariation', compact('images'));
    }
    public function imageGenerateVariation(Request $request)
    {
        $request->validate([
            'old_image' => 'required|image|mimes:png|max:4096',
            'image_size' => 'required',
        ]);
        try {
            // Open Ai Image Edit
            $qty = intval($request->quantity ?? 1);
            // Balance check
            if (showBalance()->image < $qty) {
                myAlert('error', 'Your image generate limit: ' . showBalance()->image);
                return back();
            }
            $response = OpenAI::images()->variation([
                'image' => fopen($request->file('old_image'), 'r'),
                'n' => $qty,
                'size' => $request->image_size,
                'response_format' => 'url',
            ]);
            $imageId = [];
            foreach ($response->data as $data) {
                $image = fileUploadFromUrl($data->url, "ai_images/", '');
                $imageId[] = Images::create([
                    'old_image' => fileUpload($request->file('old_image'), 'ai_images/local'),
                    'size' => $request->image_size,
                    'image_path' => $image,
                    'user_id' => Auth::user()->id
                ])->id;
            }
            $id = implode(',', $imageId);
            balanceDeduction('image', $qty);
            myAlert('success', 'Image Variation Generated successfully.');
            return redirect()->route('image.variation', ['id' => $id]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', "Open AI error: " . $errorMessage);
            return redirect()->back();
        }
    }

    public function imageDelete($id)
    {
        try {
            $data = Images::findOrFail($id);
            if ($data->image_path != '' && file_exists($data->image_path)) {
                unlink($data->image_path);
            }
            $data->delete();
            myAlert('success', 'Image is deleted');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }
    public function default()
    {
        return view('default');
    }
}
