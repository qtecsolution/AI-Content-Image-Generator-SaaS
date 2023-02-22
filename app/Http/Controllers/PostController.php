<?php

namespace App\Http\Controllers;

use App\Models\UseCase;
use GuzzleHttp\Client;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $cases = UseCase::where('is_published', 1)->pluck('title', 'id');
        // $cases = [
        //     'pro_des' => 'Product Description',
        //     'blog' => 'Blog Writing',
        //     'social' => 'Social Media',
        //     'mail' => 'Mail Writing',
        //     'google_seo' => 'Google SEO',
        // ];

        return view('posts.create', compact('cases', 'request'));
    }
    /* Open AI Content Generate */
    public function openAi(Request $request)
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'keywords' => 'required',
            'use_case_id' => 'required',
            'generated_content' => 'required',
        ]);
        return $request->all();
        

        try {
            

            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            
            // return response()->json($results, 200);
        }
    }

    public function imageGenrate(Request $request)
    {
        $image_url = '';


        // Open Ai Image generate
        $response = OpenAI::images()->create([
            'prompt' => 'a man with a cat',
            'n' => 1,
            'size' => '256x256',
            'response_format' => 'url',
        ]);
        foreach ($response->data as $data) {
            $image_url = $data->url;
            echo "<img src=\"$data->url\" >";
        }
        // Image download by guzzlehttp
        $client = new Client();
        // Make a GET request to the image URL
        $response = $client->get($image_url);

        // Get the contents of the response
        $image_data = $response->getBody()->getContents();

        // Save the image data to a file using Laravel's Storage facade
        Storage::put('public/images/image.jpg', $image_data);
    }

    public function default()
    {
        return view('default');
    }
}