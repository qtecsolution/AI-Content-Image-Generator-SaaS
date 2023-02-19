<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create()
    {

        return view('posts.create');
    }
    /* Open AI Content Generate */
    public function openAi(Request $request)
    {
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => 'Write me a cover letter for web developer, keywords: laravel, mysql, php',
            'max_tokens' => 2566
        ]);
        $content =  $result['choices'][0]['text'] ?? '';
        return response()->json($content, 200);
    }

    public function imageGenrate(Request $request)
    {
        $image_url = '';


        // Open Ai Image generate
        $response = OpenAI::images()->create([
            'prompt' => 'a man who has back pain',
            'n' => 1,
            'size' => '512x512',
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
}
