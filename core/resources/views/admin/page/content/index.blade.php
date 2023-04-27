@extends('layouts.app')
@section('title')
@translate(Page Content List)
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">@translate(Page Content List)</li>
@endsection

@section('content')
<div class="main-content p-2 p-md-4 pt-0">
    <div class="row">
        <div class="col-md-12">
            <section class="my-projects">

                <div class="my-projects-header">
                    <div class="header-title">@translate(Page Section Content)</div>

                    <div class="project-button pull-right">
                        
                        <a  href="{{ route('pages.content.create', $id) }}" class="seeall-btn d-flex">
                            <span class="icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_582_23196)">
                                <path d="M7.99967 14.6668C11.6816 14.6668 14.6663 11.6821 14.6663 8.00016C14.6663 4.31826 11.6816 1.3335 7.99967 1.3335C4.31778 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.6821 4.31778 14.6668 7.99967 14.6668Z" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M8 5.3335V10.6668" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M5.33301 8H10.6663" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0_582_23196">
                                <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                                </defs>
                            </svg>


                            </span>
                            <span class="mt-1">@translate(Page Section Content Create)</span>
                        </a>
                    </div>
                </div>

                <div class="my-projects-body">
                <div class="project-table-wrapper mt-4">
                <table id="datatables" class="project-table table ">
                        <thead>
                            <tr>
                                <td>@translate(S/L)</td>
                                <td>@translate(Title)</td>
                                <td>@translate(Content)</td>

                                <td>@translate(Action)</td>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse($content as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <div class="text-truncate">
                                     @purify($item->body)
                                    </div>
                                </td>

                                <td>

                                    <div class="d-flex gap-3 align-items-center">
                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Edit content"
                                            href="{{ route('pages.content.edit', $item->id) }}">
                                            <span>
                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 15.1667H16.5M12.75 1.41669C13.0815 1.08517 13.5312 0.898926 14 0.898926C14.2321 0.898926 14.462 0.94465 14.6765 1.03349C14.891 1.12233 15.0858 1.25254 15.25 1.41669C15.4142 1.58085 15.5444 1.77572 15.6332 1.9902C15.722 2.20467 15.7678 2.43455 15.7678 2.66669C15.7678 2.89884 15.722 3.12871 15.6332 3.34319C15.5444 3.55766 15.4142 3.75254 15.25 3.91669L4.83333 14.3334L1.5 15.1667L2.33333 11.8334L12.75 1.41669Z"
                                                        stroke="#667085" stroke-width="1.66667"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                            </span>
                                        </a>



                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Delete content" href="javascript:void(0)" type="button"
                                            onclick="confirm_modal('{{ route('pages.content.destroy', $item->id) }}')">
                                            <span class="delete-icon">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.5 5H4.16667H17.5" stroke="#667085" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M15.8337 4.99996V16.6666C15.8337 17.1087 15.6581 17.5326 15.3455 17.8451C15.0329 18.1577 14.609 18.3333 14.167 18.3333H5.83366C5.39163 18.3333 4.96771 18.1577 4.65515 17.8451C4.34259 17.5326 4.16699 17.1087 4.16699 16.6666V4.99996M6.66699 4.99996V3.33329C6.66699 2.89127 6.84259 2.46734 7.15515 2.15478C7.46771 1.84222 7.89163 1.66663 8.33366 1.66663H11.667C12.109 1.66663 12.5329 1.84222 12.8455 2.15478C13.1581 2.46734 13.3337 2.89127 13.3337 3.33329V4.99996"
                                                        stroke="#667085" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M8.33301 9.16663V14.1666" stroke="#667085"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.667 9.16663V14.1666" stroke="#667085"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </span>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <h3 class="text-center">@translate(No Data Found)</h3>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
                    
                  
                 
                </div>

            </section>
        </div>

    </div>
</div>
@endsection