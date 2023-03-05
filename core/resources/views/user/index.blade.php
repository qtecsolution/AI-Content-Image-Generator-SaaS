@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">All Users</li>
@endsection

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">All Users</h4>
                        <div class="project-button pull-right">
                            <a href="{{ route('admin.all') }}" class="btn btn-light btn-xs"> <i
                                    class="fa fa-list"></i> View Admin </a>
                        </div>
                    </div>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(function() {
                let table = $('#datatables').DataTable({
                    info: false,
                    sDom: 'Rfrtlip',
                    processing: true,
                    serverSide: true,
                    ordering: true,
                    ajax: {
                        url: "{{ route('users.all') }}"
                    },

                    columns: [
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'plan_name',
                            name:'plan.name'
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
