
@extends('install.app')
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="text-center">
                <img src="{{filePath(getInstallerSystemSetting('type_logo'))}}" class="img-fluid" alt="logo">
            </div>

            <div class="text-center">
            <h1 class="h3">Congratulations!!!</h1>
            <div class="alert alert-success" role="alert">
                Congratulations! Your installation is now complete, and your new software is ready to use. We hope you enjoy using it and that it will bring you the benefits you need to achieve your goals. If you have any questions or feedback, please don't hesitate to contact our customer support team, who will be happy to assist you in any way they can. Thank you for choosing our software, and we look forward to serving you!
              </div>

            <a href="{{ \Illuminate\Support\Str::before(env('APP_URL'),'/public') }}" class="btn btn-primary btn-lg btn-block font-18">Start Using Now</a>
        </div>
    </div>
    </div>
@endsection
