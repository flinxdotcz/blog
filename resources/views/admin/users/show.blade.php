@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <div class="ui grid">
      <div class="two column row">
        <div class="nine wide column">
          <h1 class="ui header">
            @if ($user->avatarImage)
              <img src="{{$user->avatarImage->url}}" class="ui avatar image">
            @endif
            {{$user->name}}
          </h1>
        </div>
        <div class="four wide right aligned right floated column">
          <div class="ui buttons">
            <a href="{{action('\App\Http\Controllers\Admin\UsersController@edit', ['id' => $user->id])}}" class="ui primary basic button">
              <i class="icon paint brush"></i>{{trans('admin/contents.users.show.edit')}}
            </a>
            @include('admin/layouts.partials.modal', [
              'delete' => true,
              'action' => '\App\Http\Controllers\Admin\UsersController@destroy',
              'id' => $user->id,
              'header' => trans('admin/modals.users.delete.header'),
              'message' => trans('admin/modals.users.delete.message'),
              'approve' => trans('admin/modals.users.delete.approve')
            ])
            <button class="ui negative button deleteBtn">
              <i class="icon remove"></i>{{trans('admin/contents.users.show.delete')}}
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
                <i class="icon hashtag"></i> <strong>{{trans('admin/contents.users.show.id')}}:</strong> {{$user->id}}
              </div>
            </div>
            <div class="item">
              <div class="content">
                <i class="icon user"></i> <strong>{{trans('admin/contents.users.show.username')}}:</strong> {{$user->username}}
              </div>
            </div>
            <div class="item">
              <div class="content">
                <i class="icon mail"></i> <strong>{{trans('admin/contents.users.show.email')}}:</strong> {{$user->email}}
              </div>
            </div>
            <div class="item">
              <div class="content">
                <i class="icon privacy"></i> <strong>{{trans('admin/contents.users.show.role')}}:</strong> {{$user->role->name}}
              </div>
            </div>
          </div>
        </div>
        <div class="right aligned column">
          <div class="ui list">
            <div class="item">
              <div class="content">
                <i class="icon paint brush"></i> <strong>{{trans('admin/contents.users.show.updated_at')}}: </strong>
                {{$user->updated_at}}
              </div>
            </div>
            <div class="item">
              <div class="content">
                <i class="icon arrow up"></i> <strong>{{trans('admin/contents.users.show.created_at')}}: </strong>
                {{$user->created_at}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ui divider"></div>

    <div class="ui padded grid">
      <div class="row">
        <div class="three wide column">
          <div class="ui statistic">
            <div class="value">
              {{$user->articles->count()}}
            </div>
            <div class="label">
              {{trans('admin/contents.users.show.articles')}}
            </div>
          </div>
        </div>
        <div class="thirteen wide column">

        </div>
      </div>
    </div>

  </div>

@endsection
