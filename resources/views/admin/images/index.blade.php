@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.images.index')}}</h1>
    @if ($images->count())
      <div class="ui two stackable cards">
        @foreach ($images as $image)
          <div class="card">
            <div class="image">
              <img src="{{$image->url}}" alt="{{$image->name}}" />
            </div>
            <div class="content">
              <div class="header">
                {{$image->name}}
              </div>
              <div class="ui hidden divider"></div>
              @if ($image->thumbnails->count())
                <div class="left floated thumbnails">
                  <div class="ui basic blue label">
                    <i class="icon image"></i>
                    {{trans('admin/contents.images.index.thumbnails')}}
                    <div class="detail">
                      {{$image->thumbnails->count()}}
                    </div>
                  </div>
                </div>
              @endif
              @if ($image->avatars->count())
                <div class="right floated avatars">
                  <a href="{{action('\App\Http\Controllers\Admin\UsersController@show', ['id' => $image->avatars->first()->id])}}" class="ui basic black label">
                    <i class="icon smile"></i>
                    {{trans('admin/contents.images.index.avatars')}}
                    <div class="detail">
                      {{$image->avatars->first()->name}}
                    </div>
                  </a>
                </div>
              @endif
              @unless (Auth::user()->id === $image->user->id)
                <div class="author">
                  <i class="icon user"></i> {{$image->user->name}}
                </div>
              @endunless
              <div class="description">
                <i class="icon info"></i> {{$image->description}}
              </div>
              <div class="created-at">
                <i class="icon arrow up"></i> {{$image->created_at}}
              </div>
            </div>
            <div class="extra content">
              @include('admin/layouts.partials.modal', [
                'delete' => true,
                'action' => '\App\Http\Controllers\Admin\ImagesController@destroy',
                'id' => $image->id,
                'header' => trans('admin/modals.images.delete.header'),
                'message' => trans('admin/modals.images.delete.message'),
                'approve' => trans('admin/modals.images.delete.approve')
              ])
              <button class="ui negative right floated button deleteBtn">
                <i class="icon remove"></i>{{trans('admin/contents.images.index.delete')}}
              </button>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    {{$images->links()}}

  </div>

@endsection
