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
        $allData = UseCase::paginate(2);
        return view('useCase.index', compact('allData'));
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
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'prompt' => 'required',
            'input_fields'=>'required'
        ]);

        

        try {
            $input = $request->except('_token');
            $input['input_fields'] = implode(',',$request->input_fields);
            if ($request->hasFile('icon')) {
                $input['icon'] = fileUpload($request->file('icon'), 'useCase', $request->title);
            }
            UseCase::create($input);
            myAlert('success', 'Use case saved successfully.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error',$errorMessage);
            return back();
        }
    }

    /**'input_fields'=>'required'
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = UseCase::where('id',$id)->first();
        return response()->json($data,200); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = UseCase::findOrFail($id);
        return view('useCase.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'prompt' => 'required',
            'input_fields'=>'required'
        ]);

        try {
            $data = UseCase::findOrFail($id);
            $input = $request->except(['_token', '_method']);
            $input['input_fields'] = implode(',',$request->input_fields);
            if ($request->hasFile('icon')) {
                $input['icon'] = fileUpload($request->file('icon'), 'useCase', $request->title);
            }
            
            $data->update($input);
            myAlert('success', 'Use case updated successfully.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error',$errorMessage);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = UseCase::findOrFail($id);
            if ($data->icon != '' && file_exists($data->icon)) {
                unlink($data->icon);
            }
            $data->delete();
            myAlert('success', 'Data is deleted');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }
    public function getInputFields(Request $request)
    {
        $inputFields = [];
        if(isset($request->id)){
            $data = UseCase::where('id',$request->id)->first();
            $inputFields = explode(',',$data->input_fields);
        }
        return response()->json($inputFields,200); 
    }
}
