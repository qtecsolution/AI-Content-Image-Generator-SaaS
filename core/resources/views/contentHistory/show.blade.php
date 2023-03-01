@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item active">Contents History Details</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header">
                        <h4 class="header-title">Content History</h4>
                        <div class="project-button pull-right">
                            <a href="{{ route('content-history.index') }}" class="btn btn-light btn-xs"> <i
                                    class="fa fa-list"></i> Hisotry </a>
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <div class="row g-4">
                            <div class="col-5">
                                <table class="table">
                                    <tr>
                                        <th> Title </th>
                                        <th> : </th>
                                        <td> {{$data->title}} </td>
                                    </tr>
                                     <tr>
                                        <th> Keywords </th>
                                        <th> : </th>
                                        <td> {{$data->keywords}} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <th> : </th>
                                        <td> {{$data->description}} </td>
                                    </tr>
                                    <tr>
                                        <th> Use Case </th>
                                        <th> : </th>
                                        <td> {{$data->useCase->title ?? ''}} </td>
                                    </tr>
                                    <tr>
                                        <th> Tone </th>
                                        <th> : </th>
                                        <td> {{$temperature[$data->temperature] ?? 'Serious'}} </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-7">
                                <h4> Generated Content : </h4>
                                <hr>
                                <div>
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
