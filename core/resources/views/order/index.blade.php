@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
       
        <div class="my-projects-body">

            <div class="project-table-wrapper p-3 no-default-search">

                <div class="searchbox">
                    <span class="search-icon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="text" name="" id="search-datatable">
                </div>


                <table class="project-table table" id="datatables">
                    <thead>
                        <tr>
                            <th scope="col">Invoice</th>
                            <th scope="col">User</th>
                            <th scope="col">Plane</th>
                            <th scope="col">Payment</th>
                            <th scope="col" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $item)
                          <tr>
                            <td>
                                Invoice : {{$item->invoice}} <br>
                                Date: {{dateTimeFormat($item->created_at)}}<br>
                            </td>
                            <td>
                                Name : {{$item->user->name}}<br>
                                Email : {{$item->user->email}}<br>
                            </td>
                            <td>
                                Name : {{$item->plan->name}}<br>
                                Price : {{$item->plan->price}}
                            </td>
                            <td>
                                Paid: @if($item->is_paid) 
                                <span class="badge text-bg-primary">Paid</span>
                                @else
                                <span class="badge text-bg-danger">UnPaid</span>
                                @endif
                                <br>
                                Payment Method : {{strUpperCase($item->payment_method)}}
                            </td>
                            <td>
                                @if($item->is_paid)
                                <a href="{{route('plan.expanse', $item->id)}}" class="btn btn-primary" >Expanses</a>
                                @else
                                <a href="{{route('order.approved', $item->id)}}" class="btn btn-success" >Approved</a>
                                @endif
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

