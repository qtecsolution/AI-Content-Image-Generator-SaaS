@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item active">Contents</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header">
                        <h4 class="header-title">Saved Contents</h4>
                        <div class="project-button pull-right">
                            <a href="" class="btn btn-light btn-xs"> <i class="fa fa-plus-circle"></i> New </a>
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <div class="project-table-wrapper">

                            <div class="searchbox">
                                <span class="search-icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="" id="searchINputField">

                                <div class="right-text">
                                    <span>Delete</span>
                                    <span class="selected">selected 4</span>
                                    <span>Media posts </span>
                                </div>
                            </div>

                            <table id="projectTable" class="project-table table">
                                <thead>
                                    <tr>
                                        <td data-orderable="false"> <input type="checkbox" name="row-check"
                                                class="form-check-input check-lg"></td>
                                        <td>Title</td>
                                        <td>Keywords </td>
                                        <td> Use case </td>
                                        <td>Words </td>
                                        <td>Characters</td>
                                        <td>last Modified</td>
                                        <td data-orderable="false"></td>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>
                                            <input type="checkbox" name="row-check" class="form-check-input check-lg">
                                        </td>
                                        <td> 1Technology is Revolutionizing Marketing Strategies</td>
                                        <td></td>
                                        <td>
                                            <div class="social-wrapper">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                                <span>facebook</span>
                                            </div>

                                        </td>
                                        <td>
                                            3421
                                        </td>
                                        <td>342412121</td>
                                        <td> <span class="status-posted">posted</span> </td>
                                        <td>January 13, 2023 , 11:07 am </td>
                                        <td>
                                            <div class="action-wrapper">
                                                <span type="button" class="" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">
                                                    <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                                </span>

                                                <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                        aria-hidden="true"></i></a>
                                            </div>

                                        </td>
                                    </tr>

                                </tbody>


                            </table>

                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection
