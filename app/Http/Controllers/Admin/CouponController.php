<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData = Coupon::latest()->paginate(12);
        $users = User::where('type','user')->pluck('name','id')->toArray();
        return view('admin.coupon.index', compact('allData','users'));
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
            'name' => 'required|unique:coupons',
            'code' => 'required|unique:coupons',
            'min_purchase' => 'required',
            'discount_value' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'type' => 'required',
        ]);

        try {
            $input = $request->except('_token');
            $input['start_date'] = date('Y-m-d',strtotime($request->start_date));
            $input['end_date'] = date('Y-m-d',strtotime($request->end_date));
            Coupon::create($input);
            myAlert('success','Coupon created successfully.');
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
    public function show(Coupon $coupon)
    {
        return $coupon;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Coupon::findOrFail($id);
        $users = User::where('type','user')->pluck('name','id')->toArray();
        return view('admin.coupon.edit', compact('data','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => "required|unique:coupons,name,$id",
            'code' => "required|unique:coupons,code,$id",
            'min_purchase' => 'required',
            'discount_value' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'type' => 'required',
        ]);
        if($validator->fails()){
            foreach($validator->errors()->all() as $error ){
                myAlert('error', $error);
            }
            return redirect()->back(); 
        }

        try {
            $data = Coupon::findOrFail($id);
            $input = $request->except(['_token', '_method']);
            $input['start_date'] = date('Y-m-d',strtotime($request->start_date));
            $input['end_date'] = date('Y-m-d',strtotime($request->end_date));

            $data->update($input);
            myAlert('success','Data Updated successfully.');
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
            $data = Coupon::findOrFail($id);
            $data->delete();
            myAlert('success','Data is deleted successfully.');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }
}
