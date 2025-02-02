@extends('layouts.app')
@section('title', 'Use Case')
@section('breadcrumb')
    <li class="breadcrumb-item">Use Case</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom mb-3">
                        <h5 class="header-title">All Use Case Template</h5>
                        <div class="project-button pull-right">
                            <a href="{{ route('use-case.create') }}" class="seeall-btn d-flex">
                                <span class="icon">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_532_26737)">
                                            <path
                                                d="M7.99967 14.6666C11.6816 14.6666 14.6663 11.6819 14.6663 7.99998C14.6663 4.31808 11.6816 1.33331 7.99967 1.33331C4.31778 1.33331 1.33301 4.31808 1.33301 7.99998C1.33301 11.6819 4.31778 14.6666 7.99967 14.6666Z"
                                                stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M8 5.33331V10.6666" stroke="#1D2939" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.33301 8H10.6663" stroke="#1D2939" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_532_26737">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                <span class="mt-1">New</span>
                            </a>
                        </div>
                    </div>
                    <div class="my-projects-body">

                        <div class="project-table-wrapper p-3 no-default-search">

                            <div class="searchbox">
                                <span class="search-icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z"
                                            stroke="#D0D5DD" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <input type="text" name="" id="search-datatable" placeholder="Search here">
                            </div>


                            <table class="project-table table" id="datatables">
                                <thead>

                                    <tr class="bg-white">
                                        <td> Icon</td>
                                        <td>Name</td>
                                        <td>Category</td>
                                        <td> Details </td>
                                        <td data-orderable="false">Type</td>
                                        <td data-orderable="false"> Action </td>
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
                ordering: false,
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
                ajax: {
                    url: "{{ route('use-case.index') }}?<?php echo http_build_query($request->all()); ?>"
                },

                columns: [
                    {
                        data: 'case_icon',
                    },
                    {
                        data: 'title',
                    },
                    {
                        data: 'category_name',
                        name: 'category.name'
                    },
                    {
                        data: 'details',
                    },
                    {
                        data: 'type_value',
                        name:'type'
                    },
                    {
                        data: 'action',
                    }
                ]
            });

            $('#search-datatable').keyup(function() {
                table.search(this.value).draw();

            })
        });
    </script>
@endsection
