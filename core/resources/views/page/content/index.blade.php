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
            <a class="btn btn-light btn-xs" href="{{ route('pages.content.create', $id) }}">
                <i class="fa fa-plus-circle"></i> @translate(Page Section Content Create)
            </a>
        </div>
    </div>

    <div class="my-projects-body">
        <div class="card-body">
            <table id="example2" class="table table-striped- table-bordered table-hover">
                <thead>
                    <tr>
                        <th>@translate(S/L)</th>
                        <th>@translate(Title)</th>
                        <th>@translate(Total Content)</th>
                    
                        <th>@translate(Action)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($content as  $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                {!! $item->body!!}
                            </td>
                            
                            <td>

                                <div class="ms-auto">
                                    <a class="btn btn-info" href="{{ route('pages.content.edit', $item->id) }}">
                                        <i class="feather icon-edit mr-2"></i>@translate(Content Edit)</a>

                                    <a class="btn btn-danger" href="javascript:void(0)"
                                        onclick="confirm_modal('{{ route('pages.content.destroy', $item->id) }}')">
                                        <i class="feather icon-delete mr-2"></i>@translate(Delete)</a>
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
