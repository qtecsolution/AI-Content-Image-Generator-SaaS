@extends('errors::errorLayout')

@section('title', __('You are not authorized to access this resource.'))
@section('code', 'Unauthorized')
<script>
    window.setTimeout(function(){
        window.location.href='{{route("/")}}';
    },5000)
</script>
