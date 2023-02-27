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
                    type="button" role="tab" aria-controls="Stripe-tab-pane" aria-selected="false">Tawk to
                    Setup</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="RazorPay-tab" data-bs-toggle="tab" data-bs-target="#RazorPay-tab-pane"
                    type="button" role="tab" aria-controls="RazorPay-tab-pane" aria-selected="false">SMTP
                    Setup</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="FlutterWave-tab" data-bs-toggle="tab" data-bs-target="#FlutterWave-tab-pane"
                    type="button" role="tab" aria-controls="FlutterWave-tab-pane" aria-selected="false">Cms
                    setting</button>
            </li>



        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Papal-tab-pane" role="tabpanel" aria-labelledby="Papal-tab"
                tabindex="0">
                {{-- <form method="post" action="{{open.ai.store}}"> --}}
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label">OpenAi Key</label>
                    <input type="text" name="open_key"
                        value="{{ App\Http\Controllers\readConfig('open_key') }}" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="tab-pane fade" id="Stripe-tab-pane" role="tabpanel" aria-labelledby="Stripe-tab" tabindex="0">

                <form>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Stripe Submit</button>
                </form>

            </div>
            <div class="tab-pane fade" id="RazorPay-tab-pane" role="tabpanel" aria-labelledby="RazorPay-tab" tabindex="0">

                <form class="form-horizontal" action="{{ route('smtp.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2 mt-2">
                        <input type="hidden" name="types[]" value="MAIL_DRIVER">
                        <div class="">
                            <label class="control-label">MAIL DRIVER <span class="text-danger">*</span></label>
                        </div>
                        <div class="">
                            <select class="form-control" name="MAIL_DRIVER">
                                <option value="sendmail" @if (env('MAIL_DRIVER') == 'sendmail') selected @endif>
                                    Sendmail
                                </option>
                                <option value="smtp" @if (env('MAIL_DRIVER') == 'smtp') selected @endif>SMTP
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="hidden" name="types[]" value="MAIL_HOST">
                        <div class="">
                            <label class="control-label">MAIL HOST<span class="text-danger">*</span></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control" name="MAIL_HOST" value="{{ env('MAIL_HOST') }}">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="hidden" name="types[]" value="MAIL_PORT">
                        <div class="">
                            <label class="control-label">MAIL PORT <span class="text-danger">*</span></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control" name="MAIL_PORT" value="{{ env('MAIL_PORT') }}">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="hidden" name="types[]" value="MAIL_USERNAME">
                        <div class="">
                            <label class="control-label">MAIL USERNAME <span class="text-danger">*</span></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control" name="MAIL_USERNAME"
                                value="{{ env('MAIL_USERNAME') }}" required>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                        <div class="">
                            <label class="control-label">MAIL PASSWORD <span class="text-danger">*</span></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control" name="MAIL_PASSWORD"
                                value="{{ env('MAIL_PASSWORD') }}">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                        <div class="">
                            <label class="control-label">MAIL ENCRYPTION <span class="text-danger">*</span></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control" name="MAIL_ENCRYPTION"
                                value="{{ env('MAIL_ENCRYPTION') }}">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                        <div class="">
                            <label class="control-label">MAIL FROM ADDRESS <span class="text-danger">*</span></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control" name="MAIL_FROM_ADDRESS"
                                value="{{ env('MAIL_FROM_ADDRESS') }}" required>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                        <div class="">
                            <label class="control-label">MAIL FROM NAME <span class="text-danger">*</span></label>
                        </div>
                        <div class="">
                            <input type="text" class="form-control" name="MAIL_FROM_NAME"
                                value="{{ env('MAIL_FROM_NAME') }}" required>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-primary btn-block" type="submit">Save)
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="tab-pane fade" id="FlutterWave-tab-pane" role="tabpanel" aria-labelledby="FlutterWave-tab"
                tabindex="0">

                <form method="post" action="{{ route('site.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-12 mb-2">
                            <!--logo-->
                            <label class="label">CMS logo</label>

                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="logo" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview"
                                        style="background-image: url({{ App\Http\Controllers\HomeController::filePath(App\Http\Controllers\readConfig('type_logo')) }});">
                                    </div>
                                </div>
                            </div>
                            <!--logo end-->
                        </div>
                        <div class="col-md-4 col-sm-12 mb-2">
                            <!--footer logo-->
                            <label class="label">Footer Logo</label>

                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="f_logo" id="imageUpload_f_logo"
                                        accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload_f_logo"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview_f_logo"
                                        style="background-image: url({{ App\Http\Controllers\HomeController::filePath(App\Http\Controllers\readConfig('footer_logo')) }});">
                                    </div>
                                </div>
                            </div>
                            <!--footer logo end-->
                        </div>
                        <div class="col-md-4 col-sm-12 mb-2">
                            <!--favicon icon-->
                            <label class="label">Favicon Icon</label>



                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="f_icon" id="imageUpload_f_icon"
                                        accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload_f_icon"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview_f_icon"
                                        style="background-image: url({{ App\Http\Controllers\HomeController::filePath(App\Http\Controllers\readConfig('favicon_icon')) }}">
                                    </div>
                                </div>
                            </div>
                            <!--favicon end-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 ">
                            <!--name-->
                            <div class="mb-3">
                                <label class="label">CMS Name</label>
                                <input type="hidden" value="type_name" name="type_name">
                                <input type="text"
                                    value="{{ App\Http\Controllers\readConfig('type_name') }}"
                                    name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <!--footer-->
                                <label class="label font-weight-bold">CMS Footer</label>
                                <input type="hidden" value="type_footer" name="type_footer">
                                <input type="text"
                                    value="{{ App\Http\Controllers\readConfig('type_footer') }}"
                                    name="footer" class="form-control">

                            </div>
                            <div class="mb-3">
                                <!--address-->
                                <label class="label">Address</label>
                                <input type="hidden" value="type_address" name="type_address">
                                <input type="text"
                                    value="{{ App\Http\Controllers\readConfig('type_address') }}"
                                    name="address" class="form-control">

                            </div>
                            <div class="mb-3">
                                <!--mail-->
                                <label class="label">CMS Mail</label>
                                <input type="hidden" value="type_mail" name="type_mail">
                                <input type="text"
                                    value="{{ App\Http\Controllers\readConfig('type_mail') }}"
                                    name="mail" class="form-control">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <!--fb-->

                            <div class="mb-3">
                                <label class="label">CMS Facebook Link</label>
                                <input type="hidden" value="type_fb" name="type_fb">
                                <input type="text"
                                    value="{{ App\Http\Controllers\readConfig('type_fb') }}"
                                    name="fb" class="form-control">
                            </div>
                            <div class="mb-3">
                                <!--tw-->
                                <label class="label">CMS Twitter Link</label>
                                <input type="hidden" value="type_tw" name="type_tw">
                                <input type="text"
                                    value="{{ App\Http\Controllers\readConfig('type_tw') }}"
                                    name="tw" class="form-control">
                            </div>
                            <div class="mb-3">
                                <!--google-->
                                <label class="label">CMS Google Link)</label>
                                <input type="hidden" value="type_google" name="type_google">
                                <input type="text"
                                    value="{{ App\Http\Controllers\readConfig('type_google') }}"
                                    name="google" class="form-control">
                            </div>
                            <div class="mb-3">
                                <!--Number-->
                                <label class="label">CMS Number )</label>
                                <input type="hidden" value="type_number" name="type_number">
                                <input type="text"
                                    value="{{ App\Http\Controllers\readConfig('type_number') }}"
                                    name="number" class="form-control">
                            </div>


                        </div>
                    </div>

                    <div class="m-2 text-center mt-3">
                        <button class="btn btn-block btn-primary" type="submit">Save)</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
