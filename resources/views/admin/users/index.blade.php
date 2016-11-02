@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.users.index')}}</h1>
    <table class="ui very basic table">
      <thead>
        <tr>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\UsersController@index', ['sortBy' => 'id', 'desc' => $desc])}}">
              {{ trans('admin/contents.users.table.id') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\UsersController@index', ['sortBy' => 'name', 'desc' => $desc])}}">
              {{ trans('admin/contents.users.table.name') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\UsersController@index', ['sortBy' => 'email', 'desc' => $desc])}}">
              {{ trans('admin/contents.users.table.email') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\UsersController@index', ['sortBy' => 'username', 'desc' => $desc])}}">
              {{ trans('admin/contents.users.table.username') }}
            </a>
          </td>
          <td>
            {{ trans('admin/contents.users.table.role') }}
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\UsersController@index', ['sortBy' => 'created_at', 'desc' => $desc])}}">
              {{ trans('admin/contents.users.table.created_at') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\UsersController@index', ['sortBy' => 'updated_at', 'desc' => $desc])}}">
              {{ trans('admin/contents.users.table.updated_at') }}
            </a>
          </td>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr id="u-{{$user->id}}">
            <td>
              {{$user->id}}
            </td>
            <td>
              <h4 class="ui image header">
                @if ($user->avatarImage)
                  <img class="ui avatar image" src="{{$user->avatarImage->url}}" alt="{{$user->avatarImage->name}}" />
                @endif
                <div class="content">
                  <a href="{{action('\App\Http\Controllers\Admin\UsersController@show', ['id' => $user->id])}}">
                    {{$user->name}}
                  </a>
                  <div class="sub header">
                    Lorem ipsum
                  </div>
                </div>
              </h4>
            </td>
            <td>
              {{$user->email}}
            </td>
            <td>
              {{$user->username}}
            </td>
            <td>
              {{$user->role->name}}
            </td>
            <td>
              {{$user->created_at}}
            </td>
            <td>
              {{$user->updated_at}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>

@endsection
