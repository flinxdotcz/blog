@extends('layouts.main')
@section('content')

  <div class="home">
    <header class="home-header">
      <div class="main-article-wrapper">
        <a href="{{route('article', $main->slug)}}">
          <article id="m_{{$main->id}}" class="article-single">
            <header class="article-single-header">
              <div class="container-fluid">
                <div class="text-wrap">
                  <h1 class="article-single-title">{{$main->name}}</h1>
                  <p class="article-single-excerpt">{{$main->excerpt}}</p>
                  <div class="tags">
                    @if (!empty($main->tags))
                      @foreach ($main->tags as $tag)
                        <a href="{{route('tag', $tag->slug)}}">
                          <span class="tag" style="background-color: #{{$tag->colour}};">{{$tag->name}}</span>
                        </a>
                      @endforeach
                    @endif
                  </div>
                </div>
                <div class="article-single-thumbnail" style="background: url('{{isset($main->thumbnailImage) ? $main->thumbnailImage->url : ''}}') no-repeat; background-size: cover !important; background-position-y: 50%;"></div>
              </div>
            </header>
          </article>
        </a>
      </div>
    </header>
    <section class="home-content">
      <div class="container-fluid">
        <div class="row">
          <div class="latest content col-md-3 col-sm-12">
            @if (!empty($latest))
              <h2>LATEST</h2>
              <div class="row">
                @foreach ($latest as $l)
                  <a href="{{route('article', $l->slug)}}">
                    <article id="l_{{$l->id}}" class="item col-xs-12">
                      <header>
                        <div class="title">
                          <h3>{{$l->name}}</h3>
                        </div>
                        <div class="excerpt">
                          <p>{{$l->excerpt}}</p>
                        </div>
                      </header>
                    </article>
                  </a>
                @endforeach
              </div>
            @endif
          </div>
          <div class="trending content col-md-5 col-sm-8">
            @if (!empty($popular))
              <h2>NOW TRENDING</h2>
              @foreach ($popular as $p)
                <a href="{{route('article', $p->slug)}}">
                  <article id="p_{{$p->id}}" class="item">
                    <header>
                      <div class="title">
                        <h3>{{$p->name}}</h3>
                      </div>
                    </header>
                    <div class="thumbnail">
                      <img src="{{isset($p->thumbnailImage) ? $p->thumbnailImage->url : ''}}" alt="{{isset($p->thumbnailImage) ? $p->thumbnailImage->name : ''}}">
                    </div>
                  </article>
                </a>
              @endforeach
            @endif
          </div>
          <div class="popular content col-md-4 col-sm-4">
            @if (!empty($popular))
              <h2>POPULAR</h2>
              @foreach ($popular as $p)
                <a href="{{route('article', $p->slug)}}">
                  <article id="p_{{$p->id}}" class="item">
                    <header>
                      <div class="title">
                        <h3>{{$p->name}}</h3>
                      </div>
                    </header>
                    <div class="thumbnail">
                      <img src="{{isset($p->thumbnailImage) ? $p->thumbnailImage->url : ''}}" alt="{{isset($p->thumbnailImage) ? $p->thumbnailImage->name : ''}}">
                    </div>
                  </article>
                </a>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
