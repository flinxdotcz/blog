@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1 class="text-center">
      @if ($user->avatarImage)
        <div class="thumbnail avatar">
          <img src="{{$user->avatarImage->url}}">
        </div>
      @endif
      {{$user->name}}
    </h1>
    <hr>
    <div class="row">
      <div class="col-xs-12">
        <div class="buttons">
          <a href="{{action('UsersController@show', ['id' => $user->id])}}" class="btn btn-default"}}>
            {{trans('admin/contents.users.show.display')}}
          </a>
          <a href="{{action('\App\Http\Controllers\Admin\UsersController@edit', ['id' => $user->id])}}" class="btn btn-default">
            {{trans('admin/contents.users.show.edit')}}
          </a>
          @include('admin/layouts.partials.modal', [
            'delete' => true,
            'action' => '\App\Http\Controllers\Admin\UsersController@destroy',
            'id' => $user->id,
            'header' => trans('admin/modals.users.delete.header'),
            'message' => trans('admin/modals.users.delete.message'),
            'approve' => trans('admin/modals.users.delete.approve')
          ])
          <button class="btn btn-danger deleteBtn">
            {{trans('admin/contents.users.show.delete')}}
          </button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <div class="list">
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.users.show.id')}}:</strong> {{$user->id}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.users.show.username')}}:</strong> {{$user->username}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.users.show.email')}}:</strong> {{$user->email}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.users.show.role')}}:</strong> {{$user->role->name}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.users.show.articles')}}: </strong>
              {{$user->articles->count()}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 text-right">
        <div class="list">
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.users.show.updated_at')}}: </strong>
              {{$user->updated_at}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.users.show.created_at')}}: </strong>
              {{$user->created_at}}
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
