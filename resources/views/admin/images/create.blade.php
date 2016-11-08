@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1>{{trans('admin/titles.images.create')}}</h1>
    <div id="newImage"></div>
    @include('admin.images.upload')

  </div>

@endsection
