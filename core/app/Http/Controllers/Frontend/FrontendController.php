<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Plan;
use App\Models\UseCase;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // Get use cases
        $firstUseCases = UseCase::where('is_published',1)->limit(9)->get();
        $restUseCases = UseCase::where('is_published',1)->skip(9)->limit(PHP_INT_MAX)->get();
        $totalUseCase = count($restUseCases)+count($firstUseCases); 
        // Get plans 
        $plans = Plan::where('is_published', true)->latest()->get();
        // get faq
        $allFaq = Faq::where('is_published', true)->orderBy('priority','ASC')->get();
        return view('frontend.index',compact('firstUseCases','restUseCases','totalUseCase','plans','allFaq'));
    }

    public function blogs()
    {
        $blogs = Blog::where('is_published',true)->simplePaginate(12);
        $allFaq = Faq::where('is_published', true)->orderBy('priority','ASC')->get();

        return view('frontend.blog',compact('blogs','allFaq'));
        
    }
    public function blogDetails($slug)
    {
        $blog = Blog::where('is_published',true)->where('slug',$slug)->firstOrFail();

        return view('frontend.blogDetails',compact('blog'));
        
    }
}
