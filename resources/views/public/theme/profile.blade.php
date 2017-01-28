@extends('layouts.main')
@section('content')

  <div class="profile"  id="profile_{{$user->id}}">
    <header class="profile-header">
      {{-- <img src="{{isset($user->avatarImage) ? $user->avatarImage->url : '#'}}" alt="{{$user->name}}" /> --}}
      <div class="container-fluid">
        <div class="user-avatar">
          <div class="avatar" style="background: url('{{$user->avatarImage->url}}') no-repeat; background-size: cover;"></div>
          <h1>{{$user->name}}</h1>
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="row">
        <div class="profile-body col-sm-9">
          <div class="user">
            <div class="user-bio">
              <p><strong>USERNAME:</strong> {{$user->username}}</p>
              <p><strong>EMAIL:</strong> {{$user->email}}</p>
              <p><strong>ROLE:</strong> {{$user->role->name}}</p>
              <p><strong>JOINED:</strong> {{$user->created_at->diffForHumans()}}</p>
              <p><strong>BIO:</strong> {{$user->bio}}</p>
            </div>
            @if (!empty($user->articles))
              <a href="{{route('article', $user->articles->first()->slug)}}">
                <div class="user-latest">
                  <div class="title">
                    <h3>{{$user->articles->first()->name}}</h3>
                  </div>
                  <div class="excerpt">
                    <p>{{$user->articles->first()->excerpt}}</p>
                  </div>
                  <div class="thumbnail" style="background: url('{{$user->articles->first()->thumbnailImage->url}}" alt="{{$user->articles->first()->name}}') no-repeat; background-size: cover;"></div>
                </div>
              </a>
              <div class="user-all">
                <div class="row">
                  @foreach ($user->articles as $a)
                    <a href="{{route('article', $a->slug)}}">
                      <div class="single col-sm-4">
                        <p>
                          <strong>{{$a->published_at->format('d.m. Y')}}</strong>
                        </p>
                        <h3>
                          {{$a->name}}
                        </h3>
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
            @else
              <p>No articles.</p>
            @endif
          </div>
        </div>
        <div id="sidebar" class="article-single-sidebar col-sm-3">
          @include('partials.sidebar', ['blockTitle' => 'Latest articles:'])
        </div>
      </div>
    </div>
  </div>

@endsection
