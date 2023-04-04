<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{readConfig('name')}}</title>
    <link rel="icon" type="image/jpg" href="{{ filePath(readConfig('favicon_icon')) }}" />
    <style>
    h6{color:#563333;border:1px solid #ddd;padding: 5px;}
    h1{margin: 0;color: #f30707}
    
    </style>
</head>
<body style="background: #fff;">

<div style="text-align: center;width:450px;margin:0 auto;border:1px solid #ddd;box-shadow: 2px 2px 4px #686868;margin-top:60px;overflow:hidden;padding:20px;background:#fff;border-radius:5px">
    <img style="height: 200px;" src="{{asset('assets/images/error/no-results.png')}}">
    <h1>@yield('title')</h1>
    <h6> <b style="color:#000">@yield('code', __('Oh no'))</b> <br> {{chunk_split($exception->getMessage(), 70, ' ')}} <br> <small style="text-decoration:underline">{{Request::url()}}</small></h6>
    <br>
    <a style="text-decoration:none;color:#fff;padding: 10px; background: linear-gradient(135deg, hsl(228, 100%, 80%) 0%, hsl(224, 79%, 33%) 100%);;border-radius: 1.5rem;" href="{{url('/')}}"> Go Back home </a>
</div>
</body>
</html>