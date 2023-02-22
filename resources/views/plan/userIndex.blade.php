@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
          
            <div class="col-md-12">
                <div class="card custom">
                    <div class="card-header bg-info">
                        <h5 class="card-title no-margin color-white">All Plans</h5>
                        <div class="card-button">
                            <a href="{{route('plan.create')}}" class="btn btn-success btn-xs">
                                 <i class="fa fa-add"></i> 
                                 Create Plan
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name of package</th>
                                <th scope="col">package Price</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $item)
                                <tr>
                                    <th scope="row">{{$loop->index +1}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        @if($user->plan_id == $item->id)
                                        <a href="{{route('plan.expanses',$item->id)}}">See The Expanses</a>
                                        @else
                                        <a href="{{route('plan.purchase',$item->id)}}">Purchase now</a>
                                        @endif
                                        
                                       
                                    </td>
                                  </tr>
                                @endforeach
                             
                              
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
