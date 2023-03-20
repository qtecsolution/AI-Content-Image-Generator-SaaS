@extends('install.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('org.setup')}}" enctype="multipart/form-data" class="text-left">
                @csrf

                <div class="form-head text-center">
                    <img src="{{filePath(getInstallerSystemSetting('type_logo'))}}" class="img-fluid" alt="logo">
                </div>
                <h4 class="text-lg-center  ont-weight-bold p-3">@lang('Setup CMS Setting')</h4>
                <div class="row">
                    <div class="col-4">
                        <!--logo-->
                        <label class="label">@lang('CMS logo')</label>
                       

                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="type_logo" id="imageUpload" accept=".png, .jpg, .jpeg"/>
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                     style="background-image: url({{filePath(getInstallerSystemSetting('type_logo'))}});">
                                </div>
                            </div>
                        </div>
                        <!--logo end-->
                    </div>
                    
                    <div class="col-4">
                        <!--footer logo-->
                        <label class="label">@lang('CMS Footer Logo')</label>
                       

                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="footer_logo" id="imageUpload_f_logo" accept=".png, .jpg, .jpeg"/>
                                <label for="imageUpload_f_logo"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview_f_logo"
                                     style="background-image: url({{filePath(getInstallerSystemSetting('footer_logo'))}});">
                                </div>
                            </div>
                        </div>
                        <!--footer logo end-->
                    </div>
                    <div class="col-4">
                        <!--favicon icon-->
                        <label class="label">@lang('Fav Icon')</label>
                        


                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="favicon_icon" id="imageUpload_f_icon" accept=".png, .jpg, .jpeg"/>
                                <label for="imageUpload_f_icon"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview_f_icon"
                                     style="background-image: url({{filePath(getInstallerSystemSetting('favicon_icon'))}}">
                                </div>
                            </div>
                        </div>
                        <!--favicon end-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <!--name-->
                        <label class="label mb-2">@lang('CMS Name')</label>

                        <input type="text"  value="{{ getInstallerSystemSetting('type_name') }}" name="type_name"
                               class="form-control mb-2">

                        <!--footer-->
                        <label class="label  mb-2">@lang('CMS Footer')</label>
                        <input type="hidden" value="type_footer" name="type_footer">
                        <input type="text"  value="{{ getInstallerSystemSetting('type_footer') }}" name="footer"
                               class="form-control custom-input  mb-2">

                        <!--address-->
                        <label class="label  mb-2">@lang('CMS Address')</label>
                        <input type="hidden" value="type_address" name="type_address">
                        <input type="text" value="{{ getInstallerSystemSetting('type_address') }}" name="address"
                               class="form-control custom-input  mb-2">

                        <!--mail-->
                        <label class="label  mb-2">@lang('CMS Mail')</label>
                        <input type="hidden" value="type_mail" name="type_mail">
                        <input type="text" value="{{ getInstallerSystemSetting('type_mail') }}" name="mail"
                               class="form-control custom-input  mb-2">
                    </div>
                    <div class="col-6">
                        <!--fb-->
                        <label class="label  mb-2">@lang('CMS Facebook Link')</label>
                        <input type="hidden" value="type_fb" name="type_fb">
                        <input type="text" value="{{ getInstallerSystemSetting('type_fb') }}" name="fb"
                               class="form-control custom-input  mb-2">

                        <!--tw-->
                        <label class="label  mb-2">@lang('CMS Twitter Link')</label>
                        <input type="hidden" value="type_tw" name="type_tw">
                        <input type="text" value="{{ getInstallerSystemSetting('type_tw') }}" name="tw"
                               class="form-control custom-input  mb-2">

                        <!--google-->
                        <label class="label  mb-2">@lang('CMS Google Link')</label>
                        <input type="hidden" value="type_google" name="type_google">
                        <input type="text" value="{{ getInstallerSystemSetting('type_google') }}" name="google"
                               class="form-control custom-input mb-2">

                        <!--Number-->
                        <label class="label  mb-2">@lang('CMS Number')</label>
                        <input type="hidden" value="type_number" name="type_number">
                        <input type="text" value="{{ getInstallerSystemSetting('type_number') }}" name="number"
                               class="form-control custom-input mb-2">
                    </div>
                </div>





                <div class="text-center m-2">
                    <button class="btn btn-primary  font-18" type="submit">@lang('Submit For Save')</button>
                </div>
            </form>

        </div>
    </div>



@endsection
