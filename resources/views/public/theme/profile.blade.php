@extends('layouts.main')
@section('content')

  <div class="profile"  id="profile_{{$user->id}}">
    <div class="show-page">
      <header class="show-page-header">
        {{-- <img src="{{isset($user->avatarImage) ? $user->avatarImage->url : '#'}}" alt="{{$user->name}}" /> --}}
        <div class="container-fluid">
          <div class="user-avatar" style="{{!isset($user->avatarImage) ? 'padding-left: 0;' : ''}}">
            @if (isset($user->avatarImage))
              <div class="avatar" style="background: url('{{$user->avatarImage->url}}') no-repeat; background-size: cover;"></div>
            @endif
            <h1>{{$user->name}}</h1>
          </div>
        </div>
      </header>
      <div class="container-fluid">
        <div class="row">
          <div class="show-page-body col-sm-9">
            <div class="user">
              <div class="user-bio">
                <p><strong>USERNAME:</strong> {{$user->username}}</p>
                <p><strong>EMAIL:</strong> {{$user->email}}</p>
                <p><strong>ROLE:</strong> {{isset($user->role) ? $user->role->name : ''}}</p>
                <p><strong>JOINED:</strong> {{$user->created_at->diffForHumans()}}</p>
                <p><strong>BIO:</strong> {{$user->bio}}</p>
              </div>
              <div class="related content">
                @if (!empty($user->articles))
                  <br />
                  <h2>NEW</h2>
                  <a href="{{route('article', $user->articles->first()->slug)}}">
                    <div class="user-latest">
                      <div class="title">
                        <h3>{{$user->articles->first()->name}}</h3>
                      </div>
                      <div class="excerpt">
                        <p>{{$user->articles->first()->excerpt}}</p>
                      </div>
                      <div class="thumbnail" style="background: url('{{isset($user->articles->first()->thumbnailImage) ? $user->articles->first()->thumbnailImage->url : ""}}') no-repeat; background-size: cover; background-position-y: 50%;" alt="{{$user->articles->first()->name}}"></div>
                    </div>
                  </a>
                  <div class="user-all">
                    <br />
                    <h2>WRITTEN BY {{strtoupper($user->name)}}</h2>
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
          </div>
          <div id="sidebar" class="article-single-sidebar col-sm-3">
            @include('partials.sidebar', ['blockTitle' => 'Latest articles:'])
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
