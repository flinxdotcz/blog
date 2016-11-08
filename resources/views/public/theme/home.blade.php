@extends('layouts.main')
@section('content')

  <div class="home">
    <a href="{{route('article-single', $main->slug)}}">
      <header class="page-header">
        <img class="page-header-thumbnail" src="{{isset($main->thumbnailImage) ? $main->thumbnailImage->url : ''}}" />
        <div class="container-fluid">
          <div class="page-header-content">
            <h1 class="title">{{$main->name}}</h1>
            {{$main->excerpt}}
          </div>
        </div>
      </header>
    </a>
    <div class="content-divider">
      <div class="container-fluid">
        <h2 class="home-title">Articles</h2>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="home-content col-sm-9">
          @if (isset($articles))
            <div class="row clearfix">
              @foreach ($articles as $article)
                <a href="{{route('article-single', $article->slug)}}">
                  <div class="article-block col-sm-6 col-md-4">
                    <div class="article-block-thumbnail">
                      <img src="{{$article->thumbnailImage->url}}" alt="{{$article->name}}" />
                    </div>
                    <h3 class="article-block-title">
                      {{$article->name}}
                    </h3>
                    <div class="article-block-content">
                      {{$article->excerpt}}
                    </div>
                    <div class="article-block-meta">
                      {{$article->created_at}}
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          @endif
        </div>
        <aside id="sidebar" class="col-sm-3">
          @include('partials.sidebar', ['blockTitle' => 'Latest articles:'])
        </aside>
      </div>
    </div>
  </div>

@endsection
