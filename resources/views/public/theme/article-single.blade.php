@extends('layouts.main')
@section('content')

  <article id="s_{{$article->id}}" class="article-single shown-single">
    <header class="article-single-header">
      <div class="container-fluid">
        <div class="text-wrap">
          <h1 class="article-single-title">{{$article->name}}</h1>
          <div class="article-single-meta">
            <div class="date">
              {{$article->published_at->diffForHumans()}}
            </div>
            by
            <div class="author">
              <a href="{{route('profile',$article->user_id)}}">{{$article->user->name}}
              @if (isset($article->user->avatarImage))
                <div class="author-avatar" style="background: url('{{$article->user->avatarImage->url}}') no-repeat; background-size: contain;"></div>
              @endif
              </a>
            </div>
          </div>
          <div class="tags">
            @if (!empty($article->tags))
              @foreach ($article->tags as $tag)
                <a href="{{route('tag', $tag->slug)}}">
                  <span class="tag" style="background-color: #{{$tag->colour}};">{{$tag->name}}</span>
                </a>
              @endforeach
            @endif
          </div>
        </div>
        <div class="article-single-thumbnail" style="background: url('{{isset($article->thumbnailImage) ? $article->thumbnailImage->url : ''}}') no-repeat; background-size: cover !important; background-position-y: 50%;"></div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="row">
        <div class="article-single-body col-sm-9">
          {!!$article->content!!}
        </div>
        <div id="sidebar" class="article-single-sidebar col-sm-3">
          @include('partials.sidebar', ['blockTitle' => 'Latest articles:'])
        </div>
      </div>
    </div>
  </article>

@endsection
