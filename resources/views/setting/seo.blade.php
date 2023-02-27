@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Seo Tools</li>
@endsection

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row">
        <div class="col-6">
            <form class="project-table-wrapper" method="post" action="{{route('seo.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label">Meta Key</label>
                    <input type="text" class="form-control custom-input" value="{{App\Http\Controllers\readConfig('meta_key')}}" id="exampleInputEmail1" name="meta_key" aria-describedby="emailHelp">
                </div>
    
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label">Meta Title</label>
                    <input type="text" class="form-control custom-input" value="{{App\Http\Controllers\readConfig('meta_title')}}" id="exampleInputEmail1" name="meta_title" aria-describedby="emailHelp">
                </div>
    
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label">Meta Description</label>
                    <input type="text" class="form-control custom-input" value="{{App\Http\Controllers\readConfig('meta_desc')}}" id="exampleInputEmail1" name="meta_desc" aria-describedby="emailHelp">
                </div>
    
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label">Meta Image</label>
                    <input type="file" class="form-control custom-input" value="{{App\Http\Controllers\readConfig('meta_image')}}" id="exampleInputEmail1" name="meta_image" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        <div class="col-6">
            <div class="card" style="width: 18rem;">
                <img src="{{  App\Http\Controllers\HomeController::filePath(App\Http\Controllers\readConfig('meta_image'))}}" class="card-img-top" alt="...">
               
              </div>    
    </div>

    </div>
    </div>
@endsection
