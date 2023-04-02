@extends('layouts.app')
@section('title','expense')
@section('breadcrumb')
    <li class="breadcrumb-item active">expense</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-2">
                <div class="card custom">
                    <div class="card-header bg-info">
                        <h5 class="card-title no-margin color-white">User Management</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action"> <i class="fa fa-plus-circle"></i> Add
                            User </a>
                        <a href="#" class="list-group-item list-group-item-action"> <i class="fa fa-list"></i> All
                            Users </a>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card custom">
                    <div class="card-header bg-info">
                        <h5 class="card-title no-margin color-white">Add new user</h5>
                        <div class="card-button">
                            <a href="" class="btn btn-success btn-xs"> <i class="fa fa-list"></i> All Users </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control custom-input" id="inputEmail3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control custom-input" id="inputPassword3">
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                            value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            First radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2"
                                            value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                            Second radio
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3"
                                            value="option3" disabled>
                                        <label class="form-check-label" for="gridRadios3">
                                            Third disabled radio
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Example checkbox
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </div>
                </div>

                <div class="card custom">
                    <div class="card-header bg-info">
                        <h5 class="card-title no-margin color-white">Add new user</h5>
                        <div class="card-button">
                            <a href="" class="btn btn-success btn-xs"> <i class="fa fa-list"></i> All Users </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control custom-input" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                               
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control custom-input" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control custom-input" placeholder="Username" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Recipient's username"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">@example.com</span>
                            </div>

                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Your vanity URL</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                    <input type="text" class="form-control custom-input" id="basic-url"
                                        aria-describedby="basic-addon3">
                                </div>
                                <div class="form-text">Example help text goes outside the input group.</div>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control custom-input" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control custom-input" placeholder="Server" aria-label="Server">
                            </div>

                            <div class="input-group">
                                <span class="input-group-text">With textarea</span>
                                <textarea class="form-control custom-input" aria-label="With textarea"></textarea>
                            </div>



                            <div class="form-floating mb-3">
                                <input type="email" class="form-control custom-input" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control custom-input" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <button type="submit" class="btn btn-primary mt-1">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
