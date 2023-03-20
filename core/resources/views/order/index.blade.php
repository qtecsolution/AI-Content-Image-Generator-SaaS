@extends('layouts.app')
@section('title', 'Tranzactions')
@section('breadcrumb')
    <li class="breadcrumb-item">Tranzactions</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom mb-3">
                        <h5 class="header-title">All @if(isset($request->status) && $request->status==0) Pending @endif Tranzactions</h5>
                        <div class="project-button pull-right">
                            @if(isset($request->status) && $request->status==0)
                            <a href="{{ route('order.index') }}" class="btn btn-light btn-xs">
                                <i class="fa fa-list"></i>
                                All Transections
                            </a>
                            @else 
                            <a href="{{ route('order.index') }}?status=0" class="btn btn-light btn-xs">
                                <i class="fa fa-list"></i>
                                Pending Transections
                            </a>
                            @endif
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
                                        <th scope="col">Date</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col">Method</th>
                                        <th scope="col" width="10%">Status</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
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
                    url: "{{ route('order.index') }}?<?php echo http_build_query($request->all()) ?>"
                },

                columns: [
                    {
                        data: 'added_date',
                    },
                    {
                        data: 'invoice',
                        name: 'invoice'
                    },
                    {
                        data: 'user_name',
                        name: 'user.name'
                    },
                    {
                        data: 'plan_name',
                        name: 'plan.name'
                    },
                    {
                        data: 'payment_method',
                    },
                    {
                        data: 'payment_status',
                    }
                ]
            });

            $('#search-datatable').keyup(function() {
                table.search(this.value).draw();

            })
        });
    </script>
@endsection