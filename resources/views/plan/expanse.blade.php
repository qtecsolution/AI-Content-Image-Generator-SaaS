@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
          
            <div class="col-md-12">
                <div class="card custom">
                    <div class="card-header bg-info">
                        <h5 class="card-title no-margin color-white">Plan</h5>
                        <div class="card-button">
                            <a href="{{route('plan.userIndex')}}" class="btn btn-success btn-xs">
                                 <i class="fa fa-add"></i> 
                                 See Plans
                            </a>
                        </div>
                    </div>
                   

                    <div class="row">
                        <div class="col-md-4">
                            {{$plan}}
                            show the plan card here


                        </div>
                        <div class="col-md-4">

                     {{$order}}
                     show order details
                        </div>
                        <div class="col-md-4">
                            {{$expanse}}

                            show the plan expanse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
