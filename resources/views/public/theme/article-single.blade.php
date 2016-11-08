@extends('layouts.main')
@section('content')

  <article class="article">
    <header class="page-header">
      <img class="page-header-thumbnail" src="{{isset($article->thumbnailImage) ? $article->thumbnailImage->url : ''}}" />
      <div class="container-fluid">
        <div class="page-header-content">
          <h1 class="title">{{$article->name}}</h1>
          {{$article->description}}
          @if ($article->tags->count())
            <div class="tags">
              @foreach ($article->tags as $tag)
                <a href="#" class="tag" style="background-color: #{{$tag->colour}}">
                  {{$tag->name}}
                </a>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="article-meta clearfix">
        <a href="{{route('profile',$article->user_id)}}" class="item author">
          <div class="author-avatar">
            <img src="{{isset($article->user->avatarImage) ? $article->user->avatarImage->url : ''}}" alt="{{$article->user->name}}" />
          </div>
          <div class="author-content">
            {{$article->user->name}}
          </div>
        </a>
        <div class="item date">
          {{$article->published_at->diffForHumans()}}
        </div>
      </div>
      <div class="row">
        <div class="article-content col-sm-8">
          {!!$article->content!!}
        </div>
        <aside id="sidebar" class="col-sm-4">
          @include('partials.sidebar', ['blockTitle' => 'Latest articles:'])
        </aside>
      </div>
    </div>
  </article>

@endsection
