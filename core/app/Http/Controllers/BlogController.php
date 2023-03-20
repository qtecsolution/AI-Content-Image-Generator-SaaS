<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blogs.index');
    }
    public function viewAll()
    {
        $allData = Blog::with(['category', 'user'])->latest();
        return DataTables::of($allData)
            ->addIndexColumn()
            ->addColumn('status', '
                @if ($is_published == 1)
                    <span class="text-success">Published</span>
                @else
                    <span class="form-text">Draft</span>
                @endif'
            )
            ->addColumn('category_name', function ($data) {
                return $data->category->name ?? '';
            })
            ->addColumn('author_name', function ($data) {
                return $data->user->name ?? '';
            })
            ->addColumn('action', '
            <div class="action-wrapper">
                <a class="text-success" title="Blog Details" href="{{route(\'manage-blogs.show\',$id)}}">
                    <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                </a>
                <a class="text-success" title="Blog Edit" href="{{route(\'manage-blogs.edit\',$id)}}">
                    <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                </a>
                <a class="text-danger" title="Delete Blog" href="javascript:void(0)" type="button"
                    onclick="resourceDelete(\'{{ route(\'manage-blogs.destroy\', $id) }}\')">
                    <i class="fa fa-trash-o fa-lg"></i>
                </a>
            </div>
        ')
            ->rawColumns(['action','status'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = BlogCategory::pluck('name', 'id');
        return view('blogs.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|unique:blogs',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        try {
            $input = $request->except('_token');
            $input['slug'] = Str::slug($request->title);
            $input['user_id'] = Auth::user()->id;
            if ($request->hasFile('image')) {
                $input['image'] = fileUpload($request->file('image'), 'blogs', time());
            }
            Blog::create($input);
            myAlert('success', 'Blog Saved.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Blog::findOrFail($id);
        return view('blogs.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Blog::findOrFail($id);
        $category = BlogCategory::pluck('name', 'id');
        return view('blogs.edit', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => "required|unique:blogs,title,$id",
            'description' => 'required',
            'category_id' => 'required',
        ]);

        try {
            $data = Blog::findOrFail($id);
            $input = $request->except('_token');
            $input['slug'] = Str::slug($request->title);
            if ($request->hasFile('image')) {
                $input['image'] = fileUpload($request->file('image'), 'blogs', time());
            }
            $data->update($input);
            myAlert('success', 'Blog Updated.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Blog::findOrFail($id);
            if ($data->image != '' && file_exists($data->image)) {
                unlink($data->image);
            }
            $data->delete();
            myAlert('success', 'Blog is deleted.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }
}
