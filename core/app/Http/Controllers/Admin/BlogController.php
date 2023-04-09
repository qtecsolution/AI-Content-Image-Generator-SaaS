<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.blogs.index');
    }
    public function viewAll()
    {
        $allData = Blog::with(['category', 'user'])->latest();
        return DataTables::of($allData)
            ->addIndexColumn()
            ->addColumn('status', '
                @if ($is_published == 1)
                    <span class="active-pill py-1"> <span class="circle"></span> Published </span>
                @else
                <span class="draft-pill py-1"> <span class="circle"></span> Draft </span>
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
               
                <a  data-bs-toggle="tooltip"
                    data-bs-placement="top" data-bs-title="User details" href="{{route(\'manage-blogs.show\',$id)}}">
                    <span>
                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0003 12.8333V9.49996M10.0003 6.16663H10.0087M18.3337 9.49996C18.3337 14.1023 14.6027 17.8333 10.0003 17.8333C5.39795 17.8333 1.66699 14.1023 1.66699 9.49996C1.66699 4.89759 5.39795 1.16663 10.0003 1.16663C14.6027 1.16663 18.3337 4.89759 18.3337 9.49996Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    </span>
                </a>
                <a class="text-success" title="Blog Edit" href="{{route(\'manage-blogs.edit\',$id)}}">
                    <span>
                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 15.1667H16.5M12.75 1.41669C13.0815 1.08517 13.5312 0.898926 14 0.898926C14.2321 0.898926 14.462 0.94465 14.6765 1.03349C14.891 1.12233 15.0858 1.25254 15.25 1.41669C15.4142 1.58085 15.5444 1.77572 15.6332 1.9902C15.722 2.20467 15.7678 2.43455 15.7678 2.66669C15.7678 2.89884 15.722 3.12871 15.6332 3.34319C15.5444 3.55766 15.4142 3.75254 15.25 3.91669L4.83333 14.3334L1.5 15.1667L2.33333 11.8334L12.75 1.41669Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
    
                    </span>
                </a>
                <a class="text-danger" title="Delete Blog" href="javascript:void(0)" type="button"
                    onclick="resourceDelete(\'{{ route(\'manage-blogs.destroy\', $id) }}\')">
                    <span class="delete-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.5 5H4.16667H17.5" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.8337 4.99996V16.6666C15.8337 17.1087 15.6581 17.5326 15.3455 17.8451C15.0329 18.1577 14.609 18.3333 14.167 18.3333H5.83366C5.39163 18.3333 4.96771 18.1577 4.65515 17.8451C4.34259 17.5326 4.16699 17.1087 4.16699 16.6666V4.99996M6.66699 4.99996V3.33329C6.66699 2.89127 6.84259 2.46734 7.15515 2.15478C7.46771 1.84222 7.89163 1.66663 8.33366 1.66663H11.667C12.109 1.66663 12.5329 1.84222 12.8455 2.15478C13.1581 2.46734 13.3337 2.89127 13.3337 3.33329V4.99996" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.33301 9.16663V14.1666" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.667 9.16663V14.1666" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
    
                    </span>
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
        return view('admin.blogs.create', compact('category'));
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
        return view('admin.blogs.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Blog::findOrFail($id);
        $category = BlogCategory::pluck('name', 'id');
        return view('admin.blogs.edit', compact('data', 'category'));
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
