<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\UseCaseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UseCaseCategoryController extends Controller
{
    public function index()
    {
        $allData = UseCaseCategory::paginate(12);
        return view('admin.useCase.category.index', compact('allData'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blog_categories',
        ]);

        try {
            $input = $request->except('_token');
            $input['slug'] = Str::slug($request->name);
            UseCaseCategory::create($input);
            myAlert('success','Catageory Saved.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = UseCaseCategory::findOrFail($id);
        return view('admin.useCase.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|unique:blog_categories,name,$id",
        ]);

        try {
            $data = UseCaseCategory::findOrFail($id);
            $input = $request->except(['_token', '_method']);
            $input['slug'] = Str::slug($request->name);
            
            $data->update($input);
            myAlert('success','Catageory Updated.');
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
            $data = UseCaseCategory::findOrFail($id);
            $data->delete();
            myAlert('success','Catageory is deleted.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }
}
