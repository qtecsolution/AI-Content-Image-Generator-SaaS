<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        return view('user.contentHistory.index');
    }

    /**
     * Show all data in data table.
     */
    public function viewAll()
    {
        $allData = ContentHistory::with(['useCase'])->where('user_id', Auth::user()->id)
        ->orderBy('content_histories.id', 'DESC');
    return DataTables::of($allData)
        ->addIndexColumn()
        ->addColumn('checkbox', '
        <div class="customcheck mb-2">
            <input type="checkbox" value="{{$id}}" id="{{$id}}" class="input-checkbox customcheck-box"
                name="row-check" hidden>
            <label for="{{$id}}" class="customcheck-label"></label>
        </div>
         
        ')
        ->addColumn('use_case_title', function ($data) {
            return $data->useCase->title ?? '';
        })
        ->addColumn('word_count', function ($data) {
            return str_word_count($data->generated_content);
        })
        ->addColumn('action', '
        <div class="action-wrapper d-flex gap-4">
       
                <a  data-bs-toggle="tooltip"
                data-bs-placement="top" data-bs-title="User details" href="{{route(\'content-history.show\',$id)}}">
                  <span>
                  <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10.0003 12.8333V9.49996M10.0003 6.16663H10.0087M18.3337 9.49996C18.3337 14.1023 14.6027 17.8333 10.0003 17.8333C5.39795 17.8333 1.66699 14.1023 1.66699 9.49996C1.66699 4.89759 5.39795 1.16663 10.0003 1.16663C14.6027 1.16663 18.3337 4.89759 18.3337 9.49996Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
  
                  </span>
              </a>     
           
            <a data-bs-toggle="tooltip"
            data-bs-placement="top" data-bs-title="Delete Information"  title="Delete User" href="javascript:void(0)" type="button"
            onclick="resourceDelete(\'{{ route(\'content-history.destroy\', $id) }}\')">
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
        return view('user.contentHistory.show',compact('data','temperature'));
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
