@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
          
            <div class="col-md-12">
                <div class="card custom">
                    <div class="card-header bg-info">
                        <h5 class="card-title no-margin color-white">All Plans</h5>
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

                            <form method="post" action="{{route('plan.purchase.store')}}">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{$plan->id}}">
                            <input type="hidden" name="payment_method" value="paypal">
                            <input type="hidden" name="paymentAmount" value="{{$plan->price}}"> 
                            {{-- this input filed the payment done amount --}}
                            <button class="btn btn-primary" type="submit">Purchase </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
