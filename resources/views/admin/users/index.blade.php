@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1 class="text-center">{{trans('admin/titles.users.index')}}</h1>
    {{$users->links()}}
    <table class="table table-striped table-bordered table-responsive table-hover">
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
              <a href="{{action('\App\Http\Controllers\Admin\UsersController@show', ['id' => $user->id])}}">
                {{$user->name}}
              </a>
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
