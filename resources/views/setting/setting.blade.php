@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="Papal-tab" data-bs-toggle="tab" data-bs-target="#Papal-tab-pane"
                    type="button" role="tab" aria-controls="Papal-tab-pane" aria-selected="true">Open Ai Setup</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Stripe-tab" data-bs-toggle="tab" data-bs-target="#Stripe-tab-pane"
                    type="button" role="tab" aria-controls="Stripe-tab-pane" aria-selected="false">Tawk to Setup</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="RazorPay-tab" data-bs-toggle="tab" data-bs-target="#RazorPay-tab-pane"
                    type="button" role="tab" aria-controls="RazorPay-tab-pane" aria-selected="false">SMTP Setup</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="FlutterWave-tab" data-bs-toggle="tab" data-bs-target="#FlutterWave-tab-pane"
                    type="button" role="tab" aria-controls="FlutterWave-tab-pane" aria-selected="false">Cms setting</button>
            </li>

           

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Papal-tab-pane" role="tabpanel" aria-labelledby="Papal-tab"
                tabindex="0">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Papal Submit</button>
                </form>
            </div>
            <div class="tab-pane fade" id="Stripe-tab-pane" role="tabpanel" aria-labelledby="Stripe-tab" tabindex="0">

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Stripe Submit</button>
                </form>

            </div>
            <div class="tab-pane fade" id="RazorPay-tab-pane" role="tabpanel" aria-labelledby="RazorPay-tab"
                tabindex="0">

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">RazorPay Submit</button>
                </form>

            </div>
            <div class="tab-pane fade" id="FlutterWave-tab-pane" role="tabpanel" aria-labelledby="FlutterWave-tab"
                tabindex="0">

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">FlutterWave Submit</button>
                </form>

            </div>
            

        </div>
    </div>
@endsection
