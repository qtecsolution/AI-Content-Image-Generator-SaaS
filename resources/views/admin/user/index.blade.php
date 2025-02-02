@extends('layouts.app')
@section('title','All Users')
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


                        <a href="{{ route('admin.all') }}" class="seeall-btn d-flex">
                            <span class="icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.33301 4H13.9997" stroke="#1D2939" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.33301 8H13.9997" stroke="#1D2939" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.33301 12H13.9997" stroke="#1D2939" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </span>
                            <span class="mt-1">View admin</span>
                        </a>

                    </div>
                </div>
                <div class="my-projects-body">


                    <div class="project-table-wrapper p-3 no-default-search">

                        <div class="searchbox">
                            <span class="search-icon">
                               <span>
                               <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="#D0D5DD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                               </span>
                            </span>
                            <input type="text" name="" id="search-datatable" placeholder="search user">
                        </div>

                        <div class="table-responsiv ">
                            <table class="project-table table" id="datatables">
                                <thead>
                                    <tr>
                                        <td scope="col" data-orderable="false">Name</td>
                                        <td scope="col" data-orderable="false">Email</td>
                                        <td scope="col" data-orderable="false">Phone</td>
                                        <td scope="col" data-orderable="false">Plan</td>
                                        <td scope="col" width="10%" data-orderable="false">Action</td>
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
    </div>
    @endsection
    @section('script')

    <script>
    $(function() {
        let table = $('#datatables').DataTable({
            info: false,
            sDom: 'Rfrtlip',
            "dom": '<"top"f>rt<"bottom"lp><"clear">',

            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: "{{ route('users.all') }}"
            },
            language: {
                paginate: {
                    next: ` <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.16699 7.00008H12.8337M12.8337 7.00008L7.00033 1.16675M12.8337 7.00008L7.00033 12.8334" stroke="#344054" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> `,
                    previous: `<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.8337 7.00008H1.16699M1.16699 7.00008L7.00033 12.8334M1.16699 7.00008L7.00033 1.16675" stroke="#344054" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>`,
                },
                "lengthMenu": "Show _MENU_ entries ",
                pageLength: 10,
            },

            columns: [{
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
                    data: 'plan_name'
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