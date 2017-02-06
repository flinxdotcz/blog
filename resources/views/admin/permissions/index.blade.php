@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1 class="text-center">{{trans('admin/titles.permissions.index')}}</h1>

    @if (isset($roles))
      {!! Form::open(['action' => '\App\Http\Controllers\Admin\PermissionsController@update', 'method' => 'PUT']) !!}
      <table class="table table-condensed table-striped table-responsive table-hover">
        <thead>
          <tr>
            <td></td>
            @foreach ($roles as $role)
              <td>{{$role->title}}</td>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach ($permissions as $permission)
            <tr>
              <td><strong>{{$permission->title}}</strong></td>
              @foreach ($roles as $role)
                @if (in_array($permission->id, $role->permissionIds))
                  <td>
                    {!! Form::checkbox('option-' . $role->name . '-' . $permission->name, null,  true) !!}
                  </td>
                @else
                  <td>
                    {!! Form::checkbox('option-' . $role->name . '-' . $permission->name, null,  false) !!}
                  </td>
                @endif
              @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>
      {!! Form::submit(trans('admin/forms.permissions.edit.submit'), ['class' => 'btn btn-success submitBtn']) !!}
      {!! Form::close() !!}
    @endif

  </div>

@endsection
