<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Plan;
use App\Models\UseCase;
use Illuminate\Http\Request;
use Whoops\Run;

class FrontendController extends Controller
{
    public function index()
    {
        // Get use cases
        $firstUseCases = UseCase::where('is_published',1)->limit(9)->get();
        $restUseCases = UseCase::where('is_published',1)->skip(9)->limit(PHP_INT_MAX)->get();
        $totalUseCase = count($restUseCases)+count($firstUseCases); 
        // Get plans 
        $plans = Plan::where('is_published', true)->orderBy('id','ASC')->get();
        // get faq
        $allFaq = Faq::where('is_published', true)->orderBy('priority','ASC')->get();
        return view('frontend.index',compact('firstUseCases','restUseCases','totalUseCase','plans','allFaq'));
    }

    public function blogs()
    {
        $blogs = Blog::where('is_published',true)->simplePaginate(12);
        $allFaq = Faq::where('is_published', true)->orderBy('priority','ASC')->get();
        $categories = BlogCategory::all();

        return view('frontend.blog',compact('blogs','allFaq','categories'));
        
    }

    public function categoryWaysBlog($slug)
    {
        $cat = BlogCategory::where('slug',$slug)->first();
        if($cat != null){
            $blogs = Blog::where('is_published',true)->where('category_id',$cat->id)->simplePaginate(12);
        }else{
            $blogs = Blog::where('is_published',true)->simplePaginate(12);
        }
      
        $allFaq = Faq::where('is_published', true)->orderBy('priority','ASC')->get();
        $categories = BlogCategory::all();

        return view('frontend.blog',compact('blogs','allFaq','categories'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('is_published',true)->where('slug',$slug)->firstOrFail();

        return view('frontend.blogDetails',compact('blog'));
        
    }

    public function pageDetails($slug)
    {
        $page = Page::where('slug',$slug)->with('content')->firstOrFail();
        // return $page;
        return view('frontend.pageDetails',compact('page'));
    }
}
