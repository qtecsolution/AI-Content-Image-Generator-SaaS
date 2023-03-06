<?php

namespace App\Http\Controllers;

use App\Models\ContentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ContentHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contentHistory.index');
    }

    /**
     * Show all data in data table.
     */
    public function viewAll()
    {
        $allData = ContentHistory::with(['useCase'])->where('user_id', Auth::user()->id)
        ->orderBy('id', 'DESC');
    return DataTables::of($allData)
        ->addIndexColumn()
        ->addColumn('checkbox', '
        <input type="checkbox" value="{{$id}}" name="row-check" class="input-checkbox form-check-input check-lg">
        ')
        ->addColumn('use_case_title', function ($data) {
            return $data->useCase->title ?? '';
        })
        ->addColumn('word_count', function ($data) {
            return str_word_count($data->generated_content);
        })
        ->addColumn('action', '
        <div class="action-wrapper">
        <a class="text-success" title="Content Details" href="{{route(\'content-history.show\',$id)}}">
                    <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                </a>
            <a class="text-danger" title="Delete Contents" href="javascript:void(0)" type="button"
                onclick="resourceDelete(\'{{ route(\'content-history.destroy\', $id) }}\')">
                <i class="fa fa-trash-o fa-lg"></i>
            </a>
        </div>
        ')
        ->rawColumns(['action', 'checkbox'])
        ->toJson();
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = ContentHistory::findOrFail($id);
        $temperature = [
            '0' => 'Funny',
            '0.7' => 'Serious',
            '0.9' => 'Formal',
            '1' => 'Respectful',
        ];
        return view('contentHistory.show',compact('data','temperature'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = ContentHistory::findOrFail($id);
            $data->delete();
            myAlert('success', 'Content is deleted');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return redirect()->route('content-history.index');
        }
    }
    public function multipleDelete(Request $request)
    {
        $allId = explode(',',$request->id);
        try {
            foreach($allId as $id){
                $data = ContentHistory::findOrFail($id);
                $data->delete();
            }
            myAlert('success', 'Content is deleted');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return redirect()->route('content-history.index');
        }
    }
}
