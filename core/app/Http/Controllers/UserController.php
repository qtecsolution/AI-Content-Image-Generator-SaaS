<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return view('user.index');
    }
    public function viewAll()
    {
        $allData = User::where('type', 'user')->orderBy('id', 'DESC');
    return DataTables::of($allData)
        ->addIndexColumn()
        ->addColumn('plan_name', function ($data) {
            return $data->plan->name ?? '';
        })
        ->addColumn('action', '
            <div class="action-wrapper">
                <a class="text-success" title="User Details" href="{{route(\'users.show\',$id)}}">
                    <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                </a>
                <a class="text-success" title="Edit User Information" href="{{route(\'users.edit\',$id)}}">
                    <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                </a>
                <a class="text-danger" title="Delete User" href="javascript:void(0)" type="button"
                    onclick="resourceDelete(\'{{ route(\'users.destroy\', $id) }}\')">
                    <i class="fa fa-trash-o fa-lg"></i>
                </a>
            </div>
        ')
        ->rawColumns(['action', 'checkbox'])
        ->toJson();
    }
    /**
     * Create new Admin
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:100',
            'email' => "required|email|unique:users,email",
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $input = $request->except(['_token', '_method']);
            if ($request->hasFile('avatar')) {
                $input['avatar'] = fileUpload($request->file('avatar'), 'user', $request->name);
            }
            $input['password'] = Hash::make($request->password);
            $input['type'] = 'admin';
            
            User::create($input);
            myAlert('success','Updated successfully');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error',$errorMessage);
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('user.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:users,email,$id",
            'phone' => 'required',
        ]);

        try {
            $data = User::findOrFail($id);
            $input = $request->except(['_token', '_method']);
            if ($request->hasFile('avatar')) {
                $input['avatar'] = fileUpload($request->file('avatar'), 'user', $request->name);
            }
            
            $data->update($input);
            myAlert('success','Updated successfully');
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
            $data = User::findOrFail($id);
            fileDelete($data->avatar);
            $data->delete();
            myAlert('success', 'Data is deleted');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('Error', $errorMessage);
            return back();
        }
    }
    public function allAdmin()
    {
        $allData = User::where('type', 'admin')->orderBy('id', 'DESC')->paginate(20);
        return view('user.admin',compact('allData'));
    }
}
