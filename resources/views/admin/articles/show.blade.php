@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <div class="ui grid">
      <div class="two column row">
        <div class="nine wide column">
          <h1 class="ui header">{{$article->name}}</h1>
        </div>
        <div class="five wide right aligned right floated column">
          <div class="ui buttons">
            <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@edit', ['id' => $article->id])}}" class="ui green basic button">
              <i class="icon checkmark"></i>{{trans('admin/contents.articles.show.publish')}}
            </a>
            <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@edit', ['id' => $article->id])}}" class="ui blue basic button">
              <i class="icon paint brush"></i>{{trans('admin/contents.articles.show.edit')}}
            </a>
            @include('admin/layouts.partials.modal', [
              'delete' => true,
              'action' => '\App\Http\Controllers\Admin\ArticlesController@destroy',
              'id' => $article->id,
              'header' => trans('admin/modals.articles.delete.header'),
              'message' => trans('admin/modals.articles.delete.message'),
              'approve' => trans('admin/modals.articles.delete.approve')
            ])
            <button class="ui negative button deleteBtn">
              <i class="icon remove"></i>{{trans('admin/contents.articles.show.delete')}}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="ui grid">
      <div class="two column row">
        <div class="column">
          <div class="ui list">
            <div class="item">
              <div class="content">
                <i class="icon hashtag"></i> <strong>{{trans('admin/contents.articles.show.id')}}:</strong> {{$article->id}}
              </div>
            </div>
            <div class="item">
              <div class="content">
                <i class="icon user"></i><strong>{{trans('admin/contents.articles.show.author')}}: </strong>
                <a class="ui black basic image label" href="{{action('\App\Http\Controllers\Admin\UsersController@show', ['id' => $article->user->id])}}">
                  @if ($article->user->avatarImage)
                    <img src="{{$article->user->avatarImage->url}}">
                  @endif
                  {{$article->user->name}}
                  <div class="detail">{{$article->user->role->name}}</div>
                </a>
              </div>
            </div>
            <div class="item">
              <div class="content">
                <i class="icon tags"></i><strong>{{trans('admin/contents.articles.show.tags')}}: </strong>
                @if ($article->tags->count())
                  @foreach ($article->tags as $tag)
                    <a class="ui blue basic label" href="{{action('\App\Http\Controllers\Admin\TagsController@show', ['id' => $tag->id])}}">{{$tag->name}}</a>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="right aligned column">
          <div class="ui list">
            <div class="item">
              <div class="content">
                <i class="icon paint brush"></i><strong>{{trans('admin/contents.articles.show.updated_at')}}: </strong>
                {{$article->updated_at}}
              </div>
            </div>
            <div class="item">
              <div class="content">
                <i class="icon arrow up"></i><strong>{{trans('admin/contents.articles.show.created_at')}}: </strong>
                {{$article->created_at}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ui divider"></div>
    {!!$article->content!!}

  </div>

@endsection
