@extends('layouts.app')

@section('title')
    @translate(Page List)
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">@translate(Page List)</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row">
            <div class="col-md-12">
                <section class="my-projects">
                    <div class="my-projects-header">
                        <div class="header-title">@translate(Page)</div>

                        <div class="project-button pull-right">
                            <a class="btn btn-light btn-xs"
                                onclick="forModal('{{ route('pages.create') }}', '@translate(Page Create)')"
                                href="javascript:void(0)">
                                <i class="fa fa-plus-circle"></i> @translate(Add New Page)
                            </a>
                        </div>
                    </div>

                    <div class="my-projects-body">
                        <div class="card-body">
                            <table id="example2" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>@translate(S / L)</th>
                                        <th>@translate(Title)</th>
                                        <th>@translate(Total Content)</th>
                                        <th>@translate(Action)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pages as  $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>

                                            <td>{{ $item->title }}</td>
                                            <td>
                                                {{ $item->content->count() ?? 'N/A' }}
                                            </td>


                                            <td>

                                                <a class="btn btn-info btn-xs"
                                                    onclick="forModal('{{ route('pages.edit', $item->id) }}','@translate(Page Edit)')">
                                                    @translate(Edit)</a>

                                                <a class="btn btn-primary btn-xs"
                                                    href="{{ route('pages.content.index', $item->id) }}">
                                                    @translate(Page Content)</a>

                                                <a class="btn btn-danger btn-xs" href="javascript:void(0)"
                                                    onclick="confirm_modal('{{ route('pages.destroy', $item->id) }}')">Delete</a>


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
