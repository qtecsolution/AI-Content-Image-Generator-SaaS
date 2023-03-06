<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PageController extends Controller
{
    public function pageIndex()
    {
        $pages = Page::all();
        return view('page.index', compact('pages'));
    }

    //create form
    public function pageCreate()
    {
        
        return view('page.create');
    }

    //store page
    public function pageStore(Request $request)
    {
        $request->validate([
            'title' => ['required', 'unique:pages'],
        ], [
            'title.required' => translate('Title is required'),
            'title.unique' => translate('Title is unique'),
        ]);
        $page = new Page();
        $page->slug = Str::slug($request->title);
        $page->title = $request->title;
        $page->meta_keys = $request->meta_keys;
        $page->meta_title = $request->meta_title;
        $page->meta_desc = $request->meta_desc;
      
        $page->save();
        myAlert('success', 'Page create successfully');
      
        return back();
    }

    /*page Update view*/
    public function pageEdit($id)
    {
       
        $page = Page::where('id', $id)->firstOrFail();
        return view('page.edit', compact('page'));
    }


    /*update save*/
    public function pageUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'id' => 'required',
        ], [
            'title.required' => translate('Title is required'),
            'id.required' => translate('Please reload the page'),
        ]);
        $page = Page::where('id', $request->id)->firstOrFail();
        $page->title = $request->title;
        $page->meta_keys = $request->meta_keys;
        $page->meta_desc = $request->meta_desc;
        $page->meta_title = $request->meta_title;
        $page->save();
        myAlert('success', 'Page create successfully');
        return back();
    }

    /*Delete the page*/
    public function pageDestroy($id)
    {
        Page::where('id', $id)->delete();
        PageContent::where('page_id', $id)->delete();
        myAlert('success', 'Page delete successfully');
        return back();
    }

    /*page ways content */
    public function contentIndex($id)
    {
        $content = PageContent::where('page_id', $id)->get();
        return view('page.content.index', compact('content', 'id'));
    }


    /*content create*/
    public function contentCreate($id)
    {
        return view('page.content.create', compact('id'));
    }

    /*Content Create*/
    public function contentStore(Request $request)
    {
        $request->validate([
            'page_id' => 'required',
            'body' => 'required',
        ], [
            'page_id.required' => translate('Page is required'),
            'body.required' => translate('Body is required')
        ]);
        $content = new PageContent();
        $content->page_id = $request->page_id;
        $content->title = $request->title;
        $content->body = $request->body;
        $content->save();
        myAlert('success', 'Page content create successfully');
        return back();
    }

    /*Page Content Edit*/
    public function contentEdit($id)
    {
        $content = PageContent::where('id', $id)->firstOrFail();

        return view('page.content.edit', compact('content'));
    }

    /*Content Update*/
    public function contentUpdate(Request $request)
    {
        $request->validate([
            'page_id' => 'required',
            'body' => 'required',
        ], [
            'page_id.required' => translate('Page is required'),
            'body.required' => translate('Body is required'),
        ]);
        $content = PageContent::where('id', $request->id)->firstOrFail();
        $content->page_id = $request->page_id;
        $content->title = $request->title;
        $content->body = $request->body;
        $content->save();
        myAlert('success', 'Page content update successfully');
        return back();
    }

    /*Content Delete*/
    public function contentDestroy($id)
    {
        PageContent::where('id', $id)->delete();
        myAlert('success', 'Page content delete successfully');
        return back();
    }

    /*Active the page content*/
    public function contentActive(Request $request)
    {
        $content = PageContent::where('id', $request->id)->firstOrFail();
        if ($content->active == 1) {
            $content->active = 0;
        } else {
            $content->active = 1;
        }
        $content->save();
        return response(['message' => translate('Page content status is change')], 200);
    }


    /*Active the Page*/
    public function pageActive(Request $request)
    {
        $page = Page::where('id', $request->id)->firstOrFail();
        if ($page->active == 1) {
            $page->active = 0;
        } else {
            $page->active = 1;
        }
        $page->save();
        return response(['message' => translate('Page status is change')], 200);
    }

    /*only authorize user can show this */
    public function pageAuthorize(Request $request)
    {
        $page = Page::where('id', $request->id)->firstOrFail();
        if ($page->is_authorize == 1) {
            $page->is_authorize = 0;
        } else {
            $page->is_authorize = 1;
        }
        $page->save();
        return response(['message' => translate('Page status is change')], 200);
    }
}
