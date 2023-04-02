<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    public function index()
    {
        $allData = Faq::orderBy('priority','ASC')->paginate(12);
        $maxPriority = Faq::max('priority')+1;
        return view('faq.index', compact('allData','maxPriority'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|unique:faqs',
            'answer' => 'required',
        ]);

        try {
            $input = $request->except('_token');
            $input['user_id'] = Auth::user()->id;
            Faq::create($input);
            myAlert('success','Faq Saved.');
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
        $data = Faq::findOrFail($id);
        return view('faq.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => "required|unique:faqs,question,$id",
        ]);

        try {
            $data = Faq::findOrFail($id);
            $input = $request->except(['_token', '_method']);
            
            $data->update($input);
            myAlert('success','Faq Updated.');
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
            $data = Faq::findOrFail($id);
            $data->delete();
            myAlert('success','Faq is deleted.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }
}
