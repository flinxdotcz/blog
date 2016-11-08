@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-8">
        <h1>{{$article->name}}</h1>
      </div>
      <div class="col-sm-4">
        <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@edit', ['id' => $article->id])}}" class="btn btn-default">
          {{trans('admin/contents.articles.show.edit')}}
        </a>
        @include('admin/layouts.partials.modal', [
          'delete' => true,
          'action' => '\App\Http\Controllers\Admin\ArticlesController@destroy',
          'id' => $article->id,
          'header' => trans('admin/modals.articles.delete.header'),
          'message' => trans('admin/modals.articles.delete.message'),
          'approve' => trans('admin/modals.articles.delete.approve')
        ])
        <button class="btn btn-danger deleteBtn">
          {{trans('admin/contents.articles.show.delete')}}
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <div class="list">
          <div class="item">
            <div class="content">
              @unless ($article->isPublished())
                <div class="label label-info">
                  {{trans('admin/contents.articles.show.unpublished')}}
                </div>
              @endunless
            </div>
          </div>
          <div class="ui hidden divider"></div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.articles.show.id')}}:</strong> {{$article->id}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.articles.show.slug')}}:</strong> {{$article->slug}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.articles.show.updated_at')}}: </strong>
              {{$article->updated_at}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.articles.show.created_at')}}: </strong>
              {{$article->created_at}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.articles.show.published_at')}}: </strong>
              {{$article->published_at}}
            </div>
          </div>
          <div class="item">
            <div class="content clearfix">
              <strong>{{trans('admin/contents.articles.show.author')}}: </strong>
              <a class="thumbnail avatar" href="{{action('\App\Http\Controllers\Admin\UsersController@show', ['id' => $article->user->id])}}">
                @if ($article->user->avatarImage)
                  <img src="{{$article->user->avatarImage->url}}">
                @endif
                <small>{{$article->user->name}}</small>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.articles.show.tags')}}: </strong>
              @if ($article->tags->count())
                @foreach ($article->tags as $tag)
                  <a class="label label-default" href="{{action('\App\Http\Controllers\Admin\TagsController@show', ['id' => $tag->id])}}">{{$tag->name}}</a>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        @if ($article->thumbnailImage)
          <div class="thumbnail">
            <img src="{{$article->thumbnailImage->url}}" alt="{{$article->thumbnailImage->name}}" />
            <strong>{{trans('admin/contents.articles.show.thumbnail')}} </strong>
          </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        {!!$article->content!!}
      </div>
    </div>



  </div>

@endsection
