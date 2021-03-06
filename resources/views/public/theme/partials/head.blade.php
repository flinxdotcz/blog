<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (isset($ajax))
      <meta name="_root" content="{{ url('/') }}">
      <meta name="_token" content="{{csrf_token()}}">
    @endif
    @if (!isset($title))
      {{$title = null}}
    @endif
    <title>{{ Route::currentRouteName() == 'home' ? config('app.name', 'blog.app') : $title . ' - ' . config('app.name', 'blog.app') }}</title>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('css/public.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  @unless (Auth::guest())
    @include('admin.layouts.partials.nav', ['view' => 'public'])
    <body style="padding-top: 50px;">
  @else
    <body>
  @endunless
