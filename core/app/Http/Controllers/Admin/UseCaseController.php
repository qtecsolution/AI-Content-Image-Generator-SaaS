<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\UseCase;
use App\Models\UseCaseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UseCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (request()->ajax()) {
            $allData = UseCase::with('category')->orderBy('use_cases.id', 'DESC');
            if(isset($request->category)){
                $allData = $allData->where('use_case_category_id', $request->category);
            }
            return DataTables::of($allData)
                ->addIndexColumn()
                ->addColumn('category_name', function ($data) {
                    return $data->category->name ?? '';
                })
                ->addColumn('case_icon', function ($data) {
                    return "<img src=".filePath($data->icon)." alt='Icon' style='max-height:30px'>";
                })
               
                ->addColumn('action','
                <div class="action-wrapper">
                    <a class="text-danger" title="Delete Data"
                        href="javascript:void(0)" type="button"
                        onclick=\'resourceDelete("{{ route(\'use-case.destroy\', $id) }}")\'>
                        <span>
                            <svg width="18" height="19"
                                viewBox="0 0 18 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.5 4.49996H3.16667M3.16667 4.49996H16.5M3.16667 4.49996V16.1666C3.16667 16.6087 3.34226 17.0326 3.65482 17.3451C3.96738 17.6577 4.39131 17.8333 4.83333 17.8333H13.1667C13.6087 17.8333 14.0326 17.6577 14.3452 17.3451C14.6577 17.0326 14.8333 16.6087 14.8333 16.1666V4.49996H3.16667ZM5.66667 4.49996V2.83329C5.66667 2.39127 5.84226 1.96734 6.15482 1.65478C6.46738 1.34222 6.89131 1.16663 7.33333 1.16663H10.6667C11.1087 1.16663 11.5326 1.34222 11.8452 1.65478C12.1577 1.96734 12.3333 2.39127 12.3333 2.83329V4.49996M7.33333 8.66663V13.6666M10.6667 8.66663V13.6666"
                                    stroke="#667085" stroke-width="1.66667"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </span>
                    </a>
                    <a title="Edit Data" class="text-success"
                        href="{{ route(\'use-case.edit\', $id) }}" >
                        <span>
                            <svg width="20" height="21"
                                viewBox="0 0 20 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 17.1667H17.5M13.75 3.41669C14.0815 3.08517 14.5312 2.89893 15 2.89893C15.2321 2.89893 15.462 2.94465 15.6765 3.03349C15.891 3.12233 16.0858 3.25254 16.25 3.41669C16.4142 3.58085 16.5444 3.77572 16.6332 3.9902C16.722 4.20467 16.7678 4.43455 16.7678 4.66669C16.7678 4.89884 16.722 5.12871 16.6332 5.34319C16.5444 5.55766 16.4142 5.75254 16.25 5.91669L5.83333 16.3334L2.5 17.1667L3.33333 13.8334L13.75 3.41669Z"
                                    stroke="#667085" stroke-width="1.66667"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </span>
                    </a>
                </div>
                ')
                ->rawColumns(['action','case_icon'])
                ->toJson();
        }
        return view('admin.useCase.index', compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = UseCaseCategory::where('is_published', 1)->pluck('name', 'id');
        return view('admin.useCase.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $validationRules = [
            'title' => 'required',
            'use_case_category_id' => 'required',
            'details' => 'required',
            'prompt' => 'required',
            'input_fields' => 'required'
        ];
        if(in_array(1,$request->input_fields)){
            $validationRules['title_label'] = 'required';
        }else{
            unset($input['title_label']);
        }
        if(in_array(2,$request->input_fields)){
            $validationRules['short_description_label'] = 'required';
        }else{
            unset($input['short_description_label']);
        }
        if(in_array(3,$request->input_fields)){
            $validationRules['description_label'] = 'required';
        }else{
            unset($input['description_label']);
        }
        $request->validate($validationRules);



        try {
            
            if ($request->hasFile('icon')) {
                $input['icon'] = fileUpload($request->file('icon'), 'useCase', $request->title);
            }
            UseCase::create($input);
            myAlert('success', 'Use case saved successfully.');
            return back();
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }

    /**'input_fields'=>'required'
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        // This code is for import template from a predefined json file
        if (isset($request->import_from_json)) {
            try {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                UseCase::truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                $jsonUrl = asset('assets/utils/prompt.json');
                $jsonData = file_get_contents($jsonUrl);
                $jsonData = json_decode($jsonData);
                foreach ($jsonData as $data) {
                    UseCase::create([
                        'title' => $data->title,
                        'icon' => $data->icon,
                        'details' => $data->details,
                        'input_fields' => $data->input_fields,
                        'prompt' => $data->prompt,
                        'is_published' => 1
                    ]);
                }
                myAlert('success', 'Use case imported successfully.');
                return redirect()->route('use-case.index');
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
                myAlert('error', $errorMessage);
                return redirect()->route('use-case.index');
            }
        }
        $data = UseCase::where('id', $id)->first();
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = UseCaseCategory::where('is_published', 1)->pluck('name', 'id');
        $data = UseCase::findOrFail($id);
        return view('admin.useCase.edit', compact('data','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_token');
        $validationRules = [
            'title' => 'required',
            'use_case_category_id' => 'required',
            'details' => 'required',
            'prompt' => 'required',
            'input_fields' => 'required'
        ];
        if(in_array(1,$request->input_fields)){
            $validationRules['title_label'] = 'required';
        }else{
            $input['title_label'] = '';
        }
        if(in_array(2,$request->input_fields)){
            $validationRules['short_description_label'] = 'required';
        }else{
            $input['short_description_label'] = '';
        }
        if(in_array(3,$request->input_fields)){
            $validationRules['description_label'] = 'required';
        }else{
            $input['description_label'] = '';
        }
        $request->validate($validationRules);

        try {
            $data = UseCase::findOrFail($id);
            if ($request->hasFile('icon')) {
                $input['icon'] = fileUpload($request->file('icon'), 'useCase', $request->title);
            }

            $data->update($input);
            myAlert('success', 'Use case updated successfully.');
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
    
}
