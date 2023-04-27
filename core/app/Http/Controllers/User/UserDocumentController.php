<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class UserDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.contents.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allData = UserDocument::with(['useCase'])->where('user_id', Auth::user()->id)
            ->orderBy('user_documents.id', 'DESC');
        return DataTables::of($allData)
            ->addIndexColumn()
            ->addColumn('checkbox', '
            <div class="customcheck mb-2">
                <input type="checkbox"  value="{{$id}}" id="checkbox-{{$id}}" class="input-checkbox customcheck-box" name="row-check"
                    hidden>
                <label for="checkbox-{{$id}}" class="customcheck-label"></label>
            </div>
            ')
            ->addColumn('use_case_title', function ($data) {
                return $data->useCase->title ?? 'Code Generate';
            })
            ->addColumn('word_count', function ($data) {
                return str_word_count($data->generated_content);
            })
            ->addColumn('last_modify', function ($data) {
                return date('Y-m-d',strtotime($data->updated_at));
            })
            ->addColumn('action', '
            <div class="action-wrapper">
                <a class="text-success" href="{{route(\'contents.edit\',$id)}}">
                <img src="{{asset(\'assets/images/icons/edit.svg\')}}" alt="">
                </a>
                <a class="text-danger" title="Delete Contents" href="javascript:void(0)" type="button"
                    onclick="resourceDelete(\'{{ route(\'contents.destroy\', $id) }}\')">
                    <img src="{{asset(\'assets/images/icons/delete.svg\')}}" alt="">
                </a>
            </div>
            ')
            ->rawColumns(['action', 'checkbox'])
            ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'generated_content' => 'required',
        ]);
        

        try {
            $input = $request->except('_token');
            $input['user_id'] = Auth::user()->id;
            UserDocument::create($input);
            balanceDeduction('document');
            myAlert('success', 'Content Saved successfully.');
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
    public function show(UserDocument $userDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = UserDocument::findOrFail($id);
        return view('user.contents.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'generated_content' => 'required',
        ]);
        try {
            $data = UserDocument::findOrFail($id);
            DB::beginTransaction();
            $input = $request->except(['_token']);
            $data->update($input);
            DB::commit();
            myAlert('success', 'Content Updated successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
             $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = UserDocument::findOrFail($id);
            $data->delete();
            balanceDeduction('document-delete');
            myAlert('success', 'Content is deleted');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return redirect()->route('contents.index');
        }
    }
     public function multipleDelete(Request $request)
    {
        $allId = explode(',',$request->id);
        try {
            foreach($allId as $id){
                $data = UserDocument::findOrFail($id);
                $data->delete();
            }
            myAlert('success', 'Content is deleted');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return redirect()->route('contents.index');
        }
    }
}
