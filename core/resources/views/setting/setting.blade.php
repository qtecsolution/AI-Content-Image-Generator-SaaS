@extends('layouts.app')
@section('title','Setting')
@section('breadcrumb')
<li class="breadcrumb-item active"> Setting</li>
@endsection
@section('content')
<div class="main-content p-2 p-md-4 pt-0">

    <div class="container-fluid">
        <div class="row g-4">

            <div class="col-12">
                <ul class="nav nav-tabs setting-tab" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if (isset($tab) && $tab == 'openai') active @endif" id="paypal-tab"
                            data-bs-toggle="tab" data-bs-target="#paypal-tab-pane" type="button" role="tab"
                            aria-controls="paypal-tab-pane" aria-selected="true">Open Ai Setup</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if (isset($tab) && $tab == 'tawkto') active @endif" id="Stripe-tab"
                            data-bs-toggle="tab" data-bs-target="#Stripe-tab-pane" type="button" role="tab"
                            aria-controls="Stripe-tab-pane" aria-selected="false">Tawk to
                            Setup</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if (isset($tab) && $tab == 'login') active @endif" id="social-tab"
                            data-bs-toggle="tab" data-bs-target="#social-tab-pane" type="button" role="tab"
                            aria-controls="social-tab-pane" aria-selected="false">Social Login
                            Setup</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if (isset($tab) && $tab == 'seo') active @endif" id="seo-tab"
                            data-bs-toggle="tab" data-bs-target="#seo-tab-pane" type="button" role="tab"
                            aria-controls="seo-tab-pane" aria-selected="false">SEO
                            Tools</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if (isset($tab) && $tab == 'smtp') active @endif" id="RazorPay-tab"
                            data-bs-toggle="tab" data-bs-target="#RazorPay-tab-pane" type="button" role="tab"
                            aria-controls="RazorPay-tab-pane" aria-selected="false">SMTP
                            Setup</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if (isset($tab) && $tab == 'cms') active @endif" id="FlutterWave-tab"
                            data-bs-toggle="tab" data-bs-target="#FlutterWave-tab-pane" type="button" role="tab"
                            aria-controls="FlutterWave-tab-pane" aria-selected="false">CMS
                            Settings</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if (isset($tab) && $tab == 'pwa') active @endif" id="pwa-tab"
                            data-bs-toggle="tab" data-bs-target="#pwa-tab-pane" type="button" role="tab"
                            aria-controls="pwa-tab-pane" aria-selected="false">Progressive Web Apps
                            Configure</button>
                    </li>


                </ul>

                <div class="tab-content mt-5 setting-tab-content" id="myTabContent">
                    <div class="tab-pane fade @if (isset($tab) && $tab == 'openai') show active @endif"
                        id="paypal-tab-pane" role="tabpanel" aria-labelledby="paypal-tab" tabindex="0">

                        <div class="row">
                            <div class="col-lg-7">
                                <form method="post" action="{{ route('open.ai.store') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="api-key" class="form-label">OpenAi Api Key</label>
                                        <input type="text" id="api-key" name="OPENAI_API_KEY"
                                            value="{{ env('OPENAI_API_KEY') }}" class="form-control custom-input">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="open_ai_model" class="form-label">OpenAi Model</label>
                                        {!! Form::select('open_ai_model', $aiModels, readConfig('open_ai_model'), ['class'=>'form-control custom-input w-100 nice-select']) !!}
                                    </div>
                                    <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn px-4">Save</button>
                                    </div>
                                </form>

                            </div>

                            <div class="col-lg-5">
                                <h6>Here are the step-by-step instructions on how to get an OpenAI API key:</h6>

                                <ol class="m-4 fz-14 gray-800">
                                    <li>Go to the OpenAI website: <a href="https://platform.openai.com/account/billing/overview" target="_new"
                                            class="gray-800 text-decoration-underline fw-bold"> https://platform.openai.com/account/billing/overview </a>
                                    </li>
                                    <li>You will be prompted to create an account by providing your email address and a
                                        password. Once you have entered the required information, click the "Sign up"
                                        button.</li>
                                    <li>You will receive an email from OpenAI asking you to verify your email address.
                                        Follow the instructions in the email to verify your email address.</li>
                                    <li>Once you have verified your email address, log in to your OpenAI account.</li>
                                    <li>Click on the "Set up paid account" button & follow the next step.</li>
                                    <li> After complete purchase go to "API Keys" menu from left sidebar. </li>
                                    
                                    <li>Click on the " + Create new secreat key " button.</li>
                                    <li>Your API key will be generated and displayed on the screen. Make sure to copy it
                                        and keep it in a safe place, as you will need it to access the OpenAI API.</li>
                                </ol>
                                <p>Note that there may be additional requirements or steps depending on your intended
                                    use of the API, such as providing additional information about your project or
                                    applying for access to specific API features. Make sure to review the documentation
                                    and guidelines on the OpenAI website carefully to ensure that you are following all
                                    necessary steps.</p>
                            </div>
                        </div>



                    </div>
                    <div class="tab-pane fade @if (isset($tab) && $tab == 'tawkto') show active @endif"
                        id="Stripe-tab-pane" role="tabpanel" aria-labelledby="Stripe-tab" tabindex="0">

                        <div class="row">
                            <div class="col-md-7">
                                <form method="post" action="{{ route('tawkto.store') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Active Tawk to</label>
                                        <select class="form-control custom-input" name="tawk_to" required>
                                            <option value="no" {{ readConfig('tawk_to') == 'no' ? 'selected' : null }}>
                                                NO</option>
                                            <option value="yes"
                                                {{ readConfig('tawk_to') == 'yes' ? 'selected' : null }}>YES</option>
                                        </select>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="place-where" class="form-label">Place where the Tawk to
                                            script</label>
                                        <textarea class="form-control custom-input" name="code" id="place-where"
                                            rows="14">@include('layouts.tawk_to');</textarea>

                                    </div>
                                    <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn px-4">Save</button>
                                    </div>


                                </form>

                            </div>
                            <div class="col-md-5">
                                <h6>To set up Tawk chat on your website, follow these steps:</h6>
                                <ol class="m-4 fz-14 gray-800">
                                    <li>
                                        <p>Go to the Tawk website and sign up for a free account.</p>
                                    </li>
                                    <li>
                                        <p>Once you've signed up, click on "Admin" and then "Add Property."</p>
                                    </li>
                                    <li>
                                        <p>Enter your website's information and select your time zone.</p>
                                    </li>
                                    <li>
                                        <p>On the next screen, you'll be given a JavaScript code to add to your website.
                                            Copy this code.</p>
                                    </li>
                                    <li>
                                        <p>Open your website's code editor or CMS (content management system).</p>
                                    </li>
                                    <li>
                                        <p>Paste the Tawk code in the header or footer section of your website's code,
                                            depending on where you want the chat widget to appear.</p>
                                    </li>
                                    <li>
                                        <p>Save and publish your changes.</p>
                                    </li>
                                </ol>
                                <p>Once you've completed these steps, the Tawk chat widget should appear on your
                                    website. You can customize the chat widget's appearance and settings by logging into
                                    your Tawk account and accessing the settings menu. From there, you can customize the
                                    chat widget's color scheme, chat window size, and more.</p>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade @if (isset($tab) && $tab == 'login') show active @endif"
                        id="social-tab-pane" role="tabpanel" aria-labelledby="social-tab" tabindex="0">

                        <div class="row">
                            <div class="col-lg-7">
                                <form class="project-table-wrapper p-3" method="post"
                                    action="{{ route('social.store') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="googleClientId" class="form-label">Google Client Id</label>
                                        <input type="text" class="form-control custom-input"
                                            value="{{ env('GOOGLE_CLIENT_ID') }}" id="googleClientId"
                                            name="GOOGLE_CLIENT_ID" aria-describedby="emailHelp">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="googleClientSecret" class="form-label">Google Client Secret </label>
                                        <input type="text" class="form-control custom-input"
                                            value="{{ env('GOOGLE_CLIENT_SECRET') }}" id="googleClientSecret"
                                            name="GOOGLE_CLIENT_SECRET" aria-describedby="emailHelp">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="googleCallback" class="form-label">Google Call back url <i data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Copy this link for use google call back url" class="fa fa-info-circle"></i> </label>
                                        <input type="text" class="form-control custom-input"
                                            value="{{route('auth.google.callback')}}" id="googleCallback"
                                            name="GOOGLE_REDIRECT_URL" aria-describedby="emailHelp">
                                    </div>



                                    <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn px-4">Save</button>
                                    </div>
                                </form>

                            </div>

                            <div class="col-lg-5">
                                <h6>Here are the general steps to get Google OAuth credentials for a web application:
                                </h6>

                                <ol class="m-4 fz-14 gray-800">
                                    <li>Go to the Google Cloud Console website: <a
                                            href="https://console.cloud.google.com/"
                                            class="gray-800 text-decoration-underline fw-bold"
                                            target="_new">https://console.cloud.google.com/</a></li>
                                    <li>Create a new project or select an existing project that you want to use for your
                                        web application.</li>
                                    <li>In the project dashboard, navigate to the APIs &amp; Services &gt; Credentials
                                        section.</li>
                                    <li>Click the "Create Credentials" button and select "OAuth client ID" from the
                                        dropdown menu.</li>
                                    <li>Choose "Web application" as the application type.</li>
                                    <li>Enter a name for your OAuth client ID.</li>
                                    <li>Add the authorized JavaScript origins and authorized redirect URIs for your web
                                        application. These are the URLs that will be allowed to access your application
                                        using OAuth.</li>
                                    <li>Click the "Create" button to generate your OAuth client ID.</li>
                                    <li>Copy the client ID and client secret and save them in a secure location. These
                                        will be used to authenticate your web application with the Google OAuth service.
                                    </li>
                                </ol>
                                <p>Once you have obtained your Google OAuth credentials, you can use them to implement
                                    OAuth authentication in your web application. Be sure to follow best practices for
                                    securing your OAuth credentials and implementing secure authentication flows to
                                    protect your users' data.</p>
                            </div>
                        </div>



                    </div>

                    <div class="tab-pane fade @if (isset($tab) && $tab == 'seo') show active @endif" id="seo-tab-pane"
                        role="tabpanel" aria-labelledby="seo-tab" tabindex="0">

                        <div class="row">
                            <div class="col-lg-7">
                                <form class="project-table-wrapper p-3" method="post" action="{{ route('seo.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="metaTitle" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control custom-input"
                                            value="{{ readConfig('meta_title') }}" id="metaTitle" name="meta_title"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="metaKey" class="form-label">Meta Keywords</label>
                                        <textarea class="form-control custom-input" id="metaKey" name="meta_key"
                                            aria-describedby="emailHelp">{{ readConfig('meta_key') }}</textarea>
                                    </div>

                                    

                                    <div class="form-group mb-3">
                                        <label for="metaDescription" class="form-label">Meta Description</label>
                                        <textarea class="form-control custom-input" id="metaDescription" name="meta_desc"
                                            aria-describedby="emailHelp"> {{ readConfig('meta_desc') }} </textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Meta Image</label>
                                        <input type="file" class="form-control custom-input" name="meta_image"
                                            aria-describedby="emailHelp">
                                        <img src="{{ filePath(readConfig('meta_image')) }}" class="mt-3" width="100">
                                    </div>

                                    <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn px-4 ">Save</button>
                                    </div>
                                </form>

                            </div>

                            <div class="col-lg-5">
                                <h6>To get meta key title and description for SEO, you can follow these steps:</h6>

                                <ol class="m-4 fz-14 gray-800">
                                    <li>Identify the pages on your website that you want to optimize for search engines.
                                    </li>
                                    <li>Determine the main keyword or key phrase that each page should be optimized for.
                                    </li>
                                    <li>Write a unique title tag and meta description for each page that includes the
                                        main keyword or key phrase and accurately describes the content of the page.
                                    </li>
                                    <li>Make sure the title tag is no more than 60 characters and the meta description
                                        is no more than 160 characters.</li>
                                    <li>Place the title tag and meta description in the head section of the HTML code
                                        for each page.</li>
                                    <li>Use a relevant and descriptive title tag that clearly conveys the content of the
                                        page to search engines and users.</li>
                                    <li>Write a compelling and informative meta description that encourages users to
                                        click through to the page.</li>
                                    <li>Avoid using duplicate title tags and meta descriptions across multiple pages on
                                        your website, as this can harm your SEO efforts.</li>
                                </ol>
                                <p>Overall, the title tag and meta description are important elements of SEO as they
                                    give search engines and users a brief summary of the content of your page. By using
                                    relevant and descriptive titles and descriptions that include your target keywords,
                                    you can improve your website's visibility and attract more qualified traffic.</p>
                            </div>
                        </div>



                    </div>

                    <div class="tab-pane fade @if (isset($tab) && $tab == 'smtp') show active @endif"
                        id="RazorPay-tab-pane" role="tabpanel" aria-labelledby="RazorPay-tab" tabindex="0">

                        <div class="row">

                            <div class="col-md-7">
                                <form class="form-horizontal" action="{{ route('smtp.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3 mt-2">
                                        <input type="hidden" name="types[]" value="MAIL_DRIVER">
                                        <label class="form-label" for="mailDriver">MAIL DRIVER <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control custom-input" name="MAIL_DRIVER" id="mailDriver">
                                            <option value="sendmail" @if (env('MAIL_DRIVER')=='sendmail' ) selected
                                                @endif>
                                                Sendmail
                                            </option>
                                            <option value="smtp" @if (env('MAIL_DRIVER')=='smtp' ) selected @endif>
                                                SMTP
                                            </option>
                                        </select>
                                    </div>


                                    <div class="form-group mb-3">
                                        <input type="hidden" name="types[]" value="MAIL_HOST">
                                        <label class="form-label" for="mailHost">MAIL HOST<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-input" name="MAIL_HOST"
                                            id="mailHost" value="{{ env('MAIL_HOST') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="hidden" name="types[]" value="MAIL_PORT">

                                        <label class="form-label" for="mailPort">MAIL PORT <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-input" name="MAIL_PORT"
                                            value="{{ env('MAIL_PORT') }}" id="mailPort">
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="hidden" name="types[]" value="MAIL_USERNAME">

                                        <label class="form-label" for="mailUsername">MAIL USERNAME <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-input" id="mailUsername"
                                            name="MAIL_USERNAME" value="{{ env('MAIL_USERNAME') }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="hidden" name="types[]" value="MAIL_PASSWORD">

                                        <label class="form-label" for="mailPass">MAIL PASSWORD <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-input" name="MAIL_PASSWORD"
                                            id="mailPass" value="{{ env('MAIL_PASSWORD') }}">

                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">

                                        <label class="form-label" for="mailEncription">MAIL ENCRYPTION <span
                                                class="text-danger">*</span></label>

                                        <input type="text" class="form-control custom-input" name="MAIL_ENCRYPTION"
                                            id="mailEncription" value="{{ env('MAIL_ENCRYPTION') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                                        <label class="form-label" for="mailAddress">MAIL FROM ADDRESS <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-input" id="mailAddress"
                                            name="MAIL_FROM_ADDRESS" value="{{ env('MAIL_FROM_ADDRESS') }}" required>

                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                                        <label class="form-label" for="mailfromName">MAIL FROM NAME <span
                                                class="text-danger">*</span></label>

                                        <input type="text" class="form-control custom-input" id="mailfromName"
                                            name="MAIL_FROM_NAME" value="{{ env('MAIL_FROM_NAME') }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="col-lg-12 text-right">
                                            <div class="generate-btn-wrapper">
                                                <button type="submit" class="generate-btn px-4">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="col-md-5">
                                <h6>To set up SMTP values for your email client, you will need to obtain the SMTP server
                                    details from your email service provider. Here are the general steps you can follow
                                    to get SMTP setup values:
                                </h6>
                                <ol class="m-4 fz-14 gray-800">
                                    <li>Log in to your email account.</li>
                                    <li>Navigate to the account settings or configuration section of your email client.
                                    </li>
                                    <li>Look for the SMTP settings or SMTP configuration options.</li>
                                    <li>Find the SMTP server hostname or IP address and the port number required to
                                        establish an SMTP connection. This information is typically provided by your
                                        email service provider.</li>
                                    <li>Depending on your email client, you may also need to select the appropriate
                                        security protocol, such as SSL or TLS.</li>
                                    <li>Enter the SMTP server hostname or IP address, port number, and security protocol
                                        settings in the appropriate fields in your email client's SMTP settings.</li>
                                    <li>Enter your email address and password for authentication purposes.</li>
                                    <li>Test your SMTP settings by sending a test email to make sure your setup is
                                        working correctly.</li>
                                </ol>
                                <p>Note that the specific steps for setting up SMTP values can vary depending on the
                                    email client or service you are using. You should consult the documentation or
                                    support resources provided by your email service provider or email client for more
                                    detailed instructions.</p>
                            </div>

                        </div>


                    </div>

                    <div class="tab-pane fade @if (isset($tab) && $tab == 'cms') show active @endif"
                        id="FlutterWave-tab-pane" role="tabpanel" aria-labelledby="FlutterWave-tab" tabindex="0">

                        <form method="post" action="{{ route('site.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="sitelogos-wrapper">
                                <!-- logo  -->
                                <div class="logo-box">
                                    <span class="box-title">Icon <i class="fa fa-info-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Upload a 512 x 512px icon for your Favicon & PWA, which will be resized accordingly."></i></span>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="logo" id="imageUpload"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                style="background-image: url({{ filePath(readConfig('type_logo')) }});">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- favicon    -->
                                <div class="logo-box d-none">
                                     <span class="box-title">Favicon Icon </span>
                                    
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="f_icon" id="imageUpload_f_icon"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload_f_icon"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview_f_icon"
                                                style="background-image: url({{ filePath(readConfig('favicon_icon')) }})">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>



                          

                            <div class="row mt-5">
                                <div class="col-md-6 ">
                                    <!--name-->
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="applicantName">Application Name</label>
                                        <input type="hidden" value="type_name" name="type_name">
                                        <input type="text" value="{{ readConfig('type_name') }}" name="name"
                                            class="form-control custom-input" id="applicantName">
                                    </div>
                                    <div class="form-group mb-3">
                                        <!--footer-->
                                        <label class="form-label" for="applicantFooter">Application Footer</label>
                                        <input type="hidden" value="type_footer" name="type_footer">
                                        <input type="text" value="{{ readConfig('type_footer') }}" name="footer"
                                            class="form-control custom-input" id="applicantFooter">

                                    </div>
                                    <div class="form-group mb-3">
                                        <!--address-->
                                        <label class="form-label" for="address">Address</label>
                                        <input type="hidden" value="type_address" name="type_address">
                                        <input type="text" value="{{ readConfig('type_address') }}" name="address"
                                            class="form-control custom-input" id="address">

                                    </div>
                                    <div class="form-group mb-3">
                                        <!--mail-->
                                        <label class="form-label" for="cmsMail"> Mail</label>
                                        <input type="hidden" value="type_mail" name="type_mail">
                                        <input type="text" value="{{ readConfig('type_mail') }}" name="mail"
                                            class="form-control custom-input" id="cmsMail">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <!--fb-->

                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="cmsFb">Facebook Link</label>
                                        <input type="hidden" value="type_fb" name="type_fb">
                                        <input type="text" value="{{ readConfig('type_fb') }}" name="fb"
                                            class="form-control custom-input" id="cmsFb">
                                    </div>

                                   
                                    <div class=" form-group mb-3">
                                        <!--tw-->
                                        <label class="form-label" for="twitter"> Twitter Link</label>
                                        <input type="hidden" value="type_tw" name="type_tw">
                                        <input type="text" value="{{ readConfig('type_tw') }}" name="tw"
                                            class="form-control custom-input" id="twitter">
                                    </div>
                                    <div class=" form-group mb-3">
                                        <!--google-->
                                        <label class="form-label" for="cmsGoogle"> Google Link</label>
                                        <input type="hidden" value="type_google" name="type_google">
                                        <input type="text" value="{{ readConfig('type_google') }}" name="google"
                                            class="form-control custom-input" id="cmsGoogle">
                                    </div>
                                    <div class="form-group mb-3 ">
                                        <!--Number-->
                                        <label class="form-label" for="cmsNumber">Contact Number </label>
                                        <input type="hidden" value="type_number" name="type_number">
                                        <input type="text" value="{{ readConfig('type_number') }}" name="number"
                                            class="form-control custom-input" id="cmsNumber">
                                    </div>


                                </div>
                            </div>

                            <div class="m-2 text-center mt-3">
                                <div class="generate-btn-wrapper">
                                    <button type="submit" class="generate-btn px-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade @if (isset($tab) && $tab == 'pwa') show active @endif" id="pwa-tab-pane"
                        role="tabpanel" aria-labelledby="pwa-tab" tabindex="0">

                        <form method="post" action="{{ route('pwa.setup.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- progressive web app status -->
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">@translate(Progressive Web Apps Actives Status)
                                            <span class="text-danger">*</span></label>
                                        <select name="pwa_active" class="form-control select2" required>
                                            <option value="yes"
                                                {{ readConfig('pwa_active') == 'yes' ? 'selected' : null }}>
                                                @translate(On)</option>
                                            <option value="off"
                                                {{ readConfig('pwa_active') == 'off' ? 'selected' : null }}>
                                                @translate(Off)</option>
                                        </select>
                                    </div>

                                    <!--name -->
                                    {{-- <div class="form-group mb-3">
                                        <label class="form-label" for="appname">@translate(Progressive Web Apps
                                            Name)</label>
                                        <input class="form-control custom-input" name="pwa_name" type="text"
                                            id="appname" value="{{ config('laravelpwa.name') }}">
                                    </div> --}}
                                    <!-- short name  -->
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="shortname">@translate(Progressive Web Apps Short
                                            Name)</label>
                                        <input class="form-control custom-input" name="short_name" type="text"
                                            id="shortname" value="{{ config('laravelpwa.manifest.short_name') }}">
                                    </div>


                                    <div class="row g-4">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3 ">
                                                <label class="col-form-label">@translate(Progressive Web Apps background
                                                    color)</label>
                                                <input class="form-control custom-input py-2" name="background_color"
                                                    type="color"
                                                    value="{{ config('laravelpwa.manifest.background_color') }}">
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="col-form-label">@translate(Progressive Web Apps theme
                                                    color)</label>
                                                <input class="form-control custom-input" name="theme_color" type="color"
                                                    value="{{ config('laravelpwa.manifest.theme_color') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn px-4">@translate(Save)</button>
                                    </div>




                                </div>

                                <div class="col-lg-6 ">
                                </div>

                            </div>



                        </form>
                    </div>


                </div>

            </div>


        </div>
    </div>

</div>
@endsection