@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.images.create')}}</h1>
    <div id="newImage"></div>
    @include('admin.images.upload')

  </div>

@endsection
