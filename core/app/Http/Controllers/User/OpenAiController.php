<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AiChatHistory;
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
        } elseif (showBalance()->word_count == 0) {
            myAlert('error', 'Your word limit: 0');
            return redirect()->route('user.purchase');
        }
        if (isset($request->case)) {
            $defaultCase = UseCase::where('id', $request->case);
        } else {
            $defaultCase = UseCase::orderBy('id','ASC');
        }
        $cases = UseCase::where('is_published', 1);
        if(!in_array("0",showBalance()->templates)){
            $defaultCase = $defaultCase->whereIn('type',showBalance()->templates);
            $cases = $cases->whereIn('type',showBalance()->templates);
        }
        $defaultCase = $defaultCase->first();
        if($defaultCase == ''){
            myAlert('error','You should upgrade you subscription plan.');
            return redirect()->route('user.purchase');
        }
        $cases = $cases->pluck('title', 'id');
        $languages = Language::where('status', 1)->pluck('language', 'language');
        return view('user.openAi.content', compact('cases', 'request', 'languages', 'defaultCase'));
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
            $placeholder = array("[title]", "[short_description]", "[description]");
            $replaceBy = array($request->title ?? '', $request->short_description ?? '', $request->description ?? '');
            $prompt = str_replace($placeholder, $replaceBy, $case->prompt);
            $prompt .= " The tone of voice must be $request->tone. Give me the response in $request->language language.";

            $temp = floatval($request->temp ?? 0.7);

            $plan = Plan::where('id', auth()->user()->plan_id)->first();
            $max_tokens = ((int)$plan->max_words < (int)$request->max_words) ? (int)$plan->max_words : (int)$request->max_words;
            $model = readConfig('open_ai_model');
            $max_results = (int)$request->quantity;
            // Open AI API call
            $result = OpenAI::completions()->create([
                'model' => $model,
                'prompt' => $prompt,
                'temperature' => $temp,
                'max_tokens' => $max_tokens,
                'n' => $max_results
            ]);
            $text = '';
            $counter = 1;
            if (isset($result['choices'])) {
                if ($model != 'gpt-3.5-turbo' && $model != 'gpt-4' && $model != 'gpt-4-32k') {
                    if (count($result['choices']) > 1) {
                        foreach ($result['choices'] as $value) {
                            $text .= '('.$counter . '). ' . ltrim($value['text']) . "\r\n\r\n\r\n";
                            $counter++;
                        }
                    } else {
                        $text = $result['choices'][0]['text'];
                    }
                } else {
                    if (count($result['choices']) > 1) {
                        foreach ($result['choices'] as $value) {
                            $text .= $counter . '. ' . trim($value['message']['content']) . "\r\n\r\n\r\n";
                            $counter++;
                        }
                    } else {
                        $text = ltrim($result['choices'][0]['message']['content']);
                    }
                }
            }else{
                if (isset($result['error']['message'])) {
                    $message = $result['error']['message'];
                } else {
                    $message = __('There is an issue with your openai account');
                }
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong',
                    'error' => $message,
                ], 400);
            }
            //$tokens = $result['usage']['completion_tokens'];
            $wordCount = str_word_count($text) ?? 0;
            $charCount = strlen($text) ?? 0;
            // null space to br
            $content = preg_replace('/([^>\r\n]?)(\r\n|\n\r|\r|\n)/', '$1<br>$2', $text);
            //remove all leading <br> tags
            $pattern = '/^(' . preg_quote('<br>', '/') . ')+/';
            $content = preg_replace($pattern, '',  $content);
            $results = [
                'content' => $content,
                'words' => $wordCount,
                'characters' => $charCount
            ];
            // Content history create
            $titleText = $request->title??'';
            if(!isset($request->title) && isset($request->short_description)){
                $titleText = substr($request->short_description, 0, 200);
            }elseif(!isset($request->title) && isset($request->description)){
                $titleText = substr($request->description, 0, 200);
            }
            ContentHistory::create([
                'title' => $titleText,
                'short_description' => $request->short_description ?? '',
                'description' => $request->description ?? '',
                'temperature' => $temp,
                'generated_content' => $content,
                'prompt' => $prompt,
                'use_case_id' => $request->use_case,
                'user_id' => Auth::user()->id
            ]);
            balanceDeduction('word',$wordCount);
            return response()->json($results, 200);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $errorMessage,
            ], 400);
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

        return view('user.openAi.image', compact('images'));
    }
    // ALL Generated Images List
    public function allImages(Request $request)
    {
        $images = Images::where('user_id', Auth::user()->id);
        if (isset($request->q)) {
            $images = $images->where('prompt', 'like', "%$request->q%");
        }
        $images = $images->latest()->paginate(12);
        return view('user.openAi.allImages', compact('images', 'request'));
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
        return view('user.openAi.imageVariation', compact('images'));
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


    // Code generate
    public function code()
    {
        if (showBalance() == '') {
            myAlert('error', 'Subscribe any plan first!');
            return redirect()->route('user.purchase');
        } elseif (showBalance()->word_count == 0) {
            myAlert('error', 'Your word limit: 0');
            return redirect()->route('user.purchase');
        }
        return view('user.openAi.code');
    }
    /* Open AI Content Generate */
    public function codeGenerate(Request $request)
    {
        if(showBalance()->code_generate_enabled!=1){
            return response()->json([
                'success' => false,
                'message' => 'Permission errors',
                'error' => 'You should upgrade your subscription plan for access AI Code generator',
            ], 422);
        }
        $validator = Validator::make($request->all(), [
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }
        try {

            $plan = Plan::where('id', auth()->user()->plan_id)->first();
            $max_tokens = (int)$plan->max_words;
            // Open AI API call
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        "role" => "system",
                        "content" => "You are a helpful assistant that writes code."
                    ],
                    [
                        "role" => "user",
                        "content" => $request->description,
                    ],
                ],
                'temperature' => 1,
                'max_tokens' => $max_tokens,
            ]);
            $content = $result['choices'][0]['message']['content'];
            //$tokens = $result['usage']['total_tokens'];
            $wordCount = str_word_count($content) ?? 0;
            $charCount = strlen($content) ?? 0;
            $mainContent = preg_replace('/```(.+?)```/s', '<code>$1</code>', htmlspecialchars($content));
            $mainContent = "<pre class='pre-line'> $mainContent </pre>";
            // Content history create
            ContentHistory::create([
                'title' => substr($request->description, 0, 200),
                'description' => $request->description ?? '',
                'temperature' => 1,
                'type' => 'code',
                'generated_content' => $mainContent,
                'prompt' => "You are a helpful assistant that writes code.",
                'use_case_id' => $request->use_case,
                'user_id' => Auth::user()->id
            ]);
            balanceDeduction('word',$wordCount);

            $results = [
                'content' => $mainContent,
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
        }
    }



    public function chat()
    {
        if (showBalance() == '') {
            myAlert('error', 'Subscribe any plan first!');
            return redirect()->route('user.purchase');
        } elseif (showBalance()->word_count == 0) {
            myAlert('error', 'Your word limit: 0');
            return redirect()->route('user.purchase');
        }
        $chatHistory = AiChatHistory::where('user_id',Auth::user()->id)->orderBy('id','ASC')->limit(100)->get();
        return view('user.openAi.chat',compact('chatHistory'));
    }
    public function chatResponse(Request $request)
    {
        if(showBalance()->chat_enabled!=1){
            return response()->json([
                'success' => false,
                'message' => 'Permission errors',
                'error' => 'You should upgrade your subscription plan for access chat feature',
            ], 422);
        }
        $validator = Validator::make($request->all(), [
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }
        try {

            $plan = Plan::where('id', auth()->user()->plan_id)->first();
            $max_tokens = (int)$plan->max_words;
            // Open AI API call
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        "role" => "user",
                        "content" => $request->description,
                    ],
                ],
                'temperature' => 1,
                'max_tokens' => $max_tokens,
            ]);
            $content = $result['choices'][0]['message']['content'];
            // Chat history create
            AiChatHistory::create([
                'chat_request' => $request->description ?? '',
                'chat_response' => $content,
                'user_id' => Auth::user()->id
            ]);
            //$wordCount = str_word_count($content) ?? 0;
            $tokens = $result['usage']['total_tokens']??0;
            balanceDeduction('word',$tokens);

            $results = [
                'content' => $content,
            ];
            return response()->json($results, 200);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $errorMessage,
            ], 400);
        }
    }
    public function getUseCase(Request $request)
    {
        if (isset($request->id)) {
            $data = UseCase::where('id', $request->id)->first();
        }
        return response()->json($data, 200);
    }
}
