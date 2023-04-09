@extends('layouts.app')
@section('title','Contents History')
@section('breadcrumb')
    <li class="breadcrumb-item active">Contents History Details</li>
@endsection
@section('content')
    
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-0">
            <div class="col-md-12">
                <section class="my-projects ">

                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">Content History  details</h4>
                        <div class="project-button pull-right">
                          
                                    <a href="{{ route('content-history.index') }}"  class="seeall-btn d-flex">
                              <span class="icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.33301 4H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M5.33301 8H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M5.33301 12H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>

                            </span>
                            <span class="mt-1">Hisotry</span>
                        </a>        
                        </div>
                    </div>
                    <div class="my-projects-body ">
                        <div class="row g-4">
                            <div class="col-lg-5">
                                <table class="table fz-14">
                                    @if($data->title!='')
                                    <tr>
                                        <td class="font-600"> Title </td>
                                        <td> : </th>
                                        <td> {{$data->title}} </td>
                                    </tr>
                                    @endif
                                    @if($data->short_description!='')
                                     <tr>
                                        <td class="font-600"> Short Description </td>
                                        <th> : </th>
                                        <td> {{$data->short_description}} </td>
                                    </tr>
                                    @endif
                                    @if($data->description!='')
                                    <tr>
                                        <td class="font-600">  Description </td>
                                        <th> : </th>
                                        <td> {{$data->description}}  </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="font-600"> Use Case </td>
                                        <th> : </th>
                                        <td> {{$data->useCase->title ?? ''}} </td>
                                    </tr>
                                    <tr>
                                        <td class="font-600"> Tone </td>
                                        <td> : </td>
                                        <td> {{$temperature[$data->temperature] ?? 'Serious'}} </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-7 border-start">
                                <h4 class="mt-3 fz-14 font-500"> Generated Content : </h4>
                                <hr>
                                <div class="fz-14">
                                    {!! $data->generated_content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
