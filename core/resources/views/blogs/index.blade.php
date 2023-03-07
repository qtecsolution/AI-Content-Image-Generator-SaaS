@extends('layouts.app')
@section('title','Blog Posts')
@section('breadcrumb')
    <li class="breadcrumb-item active">Blogs</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">Blogs</h4>
                        <div class="project-button pull-right">
                            <a href="{{ route('manage-blogs.create') }}" class="btn btn-light btn-xs"> 
                                <i class="fa fa-plus-circle"></i> New </a>
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <div class="project-table-wrapper no-default-search p-3">

                            <div class="searchbox">
                                <span class="search-icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="" id="search-datatable">
                            </div>

                            <table id="datatables" class="project-table table">
                                <thead>
                                    <tr>
                                        <td>Title</td>
                                        <td>Tags </td>
                                        <td> Category </td>
                                        <td> Author </td>
                                        <td> Status </td>
                                        <td data-orderable="false"></td>
                                    </tr>
                                </thead>
                                <tbody> </tbody>
                            </table>

                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">


        $(function() {
            let table = $('#datatables').DataTable({
                info: false,
                sDom: 'Rfrtlip',
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: "{{ route('manage-blogs.all') }}"
                },

                columns: [
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'tags',
                        name: 'tags'
                    },
                    {
                        data: 'category_name',
                        name: 'category.name'
                    },
                    {
                        data: 'author_name',
                        name: 'user.name'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action'
                    },
                ]
            });

            $('#search-datatable').keyup(function() {
                table.search(this.value).draw();

            })
        });
    </script>
@endsection
