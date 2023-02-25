<?php

namespace App\Http\Controllers;

use App\Models\UseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UseCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData = UseCase::get();
        return view('useCase.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'prompt' => 'required',
        ]);
        

        try {
            $input = $request->except('_token');
            $input['created_by'] = Auth::user()->id;
            if($request->hasFile('icon')){
                $input['icon'] = fileUpload($request->file('icon'),'useCase',$request->title);
            }
            UseCase::create($input);
            alert()->success('Success', 'Use case saved successfully.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            alert()->error('Error', 'Something Error found!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UseCase $useCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UseCase $useCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UseCase $useCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = UseCase::findOrFail($id);
            if($data->icon != '' && file_exists($data->icon)){
                unlink($data->icon);
            }
            $data->delete();
            alert()->success('Success', 'Data is deleted');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            alert()->error('Error', $errorMessage);
            return back();
        }
    }
}
