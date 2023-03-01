@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="card custom">
                    <div class="card-header bg-info">
                        <h5 class="card-title no-margin color-white">All Plans</h5>
                        <div class="card-button">
                            <a href="{{ route('plan.create') }}" class="btn btn-success btn-xs">
                                <i class="fa fa-add"></i>
                                Create Plan
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pricing-body">

                            <div class="pricing-cards">
                                <!-- single  card free  -->
                                @foreach ($plans as $item)
                                <div class="pricing-card">

                                    <div class="pricing-card-header">
                                        <span class="price">
                                            <span class="currency">{{readConfig('currency_sambol')}}</span>
                                            <span class="number">{{$item->price}}</span>
                                            <span class="plane-time">/mo</span>
                                        </span>
                                        <span class="name">{{$item->name}}</span>
                                        <p class="info {{strpos($item->sub_name, "@") !== false ? 'text-secondary' : ''}}">{{$item->sub_name}}</p>
                                    </div>

                                    <div class="pricing-card-body">
                                        <ul class="facility-list">
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="{{asset('assets/images/icons/check.svg')}}" alt="check icon ">
                                                </span>
                                                <span>Generate Maximum {{$item->word_count}} AI Words</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="{{asset('assets/images/icons/check.svg')}}" alt="check icon ">
                                                </span>
                                                <span>{{$item->call_api_count}} Api Request / month</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="{{asset('assets/images/icons/check.svg')}}" alt="check icon ">
                                                </span>
                                                <span>Store {{$item->documet_count}} documents on server</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="{{asset('assets/images/icons/check.svg')}}" alt="check icon ">
                                                </span>
                                                <span>Store {{$item->image_count}} Generate Image on server</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper cross-icon">
                                                    <img src="{{asset('assets/images/icons/check.svg')}}" alt="cross  icon ">
                                                </span>
                                                <span>Support {{Str::upper($item->lang)}} Languages</span>
                                            </li>
                                        </ul>
                                        <div class="d-grid">
                                           <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-primary"><a class="dropdown-item"
                                                href="{{ route('plan.edit', $item->id) }}">Edit</a></button>

                                                @if ($item->is_published)
                                                <button type="button" class="btn btn-danger"><a class="dropdown-item"
                                                        href="{{ route('plan.status', [$item->id, 'deactive']) }}">Deactive
                                                        Now</a></button>
                                            @else
                                                <button type="button" class="btn btn-success"><a class="dropdown-item"
                                                        href="{{ route('plan.status', [$item->id, 'active']) }}">Active
                                                        Now</a></button>
                                            @endif
                                           </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
