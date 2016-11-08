@extends('layouts.main')
@section('content')

  <div class="profile">
    <header class="page-header">
      <img class="page-header-thumbnail" src="{{isset($user->coverImage) ? $user->coverImage->url : ''}}" />
      <div class="container-fluid">
        <div class="page-header-content profile">
          <h1 class="title">{{$user->name}}</h1>
          {{$user->username}}
        </div>
      </div>
      <div class="container-fluid">
        <div class="avatar">
          <img src="{{isset($user->avatarImage) ? $user->avatarImage->url : '#'}}" alt="{{$user->name}}" />
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="row">
        <div class="profile-content col-sm-8">

        </div>
        <aside id="sidebar" class="col-sm-4">
          @include('partials.sidebar', ['blockTitle' => 'Latest articles:'])
        </aside>
      </div>
    </div>
  </div>

@endsection
