@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1>{{trans('admin/titles.users.edit')}}: <strong>{{$user->name}}</strong></h1>
    <div class="row">
      <div class="col-sm-8">
        {!! Form::model($user, ['action' => ['\App\Http\Controllers\Admin\UsersController@update', 'id' => $user->id], 'method' => 'PUT']) !!}
          <div class="form-group">
            {!! Form::label('id', trans('admin/forms.users.edit.id')) !!}
            {!! Form::number('id', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('name', trans('admin/forms.users.edit.name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('username', trans('admin/forms.users.edit.username')) !!}
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('newPassword', trans('admin/forms.users.edit.new_password')) !!}
            {!! Form::password('newPassword', ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('repeatPassword', trans('admin/forms.users.edit.repeat_password')) !!}
            {!! Form::password('repeatPassword', ['class' => 'form-control']) !!}
          </div>

          {!! Form::hidden('image-reference', null, ['id' => 'image-reference', 'class' => 'form-control']) !!}

          {!! Form::submit(trans('admin/forms.users.edit.submit'), ['class' => 'btn btn-success submitBtn']) !!}
        {!! Form::close() !!}
      </div>
      <div class="col-sm-4">
        @include('admin.images.upload')
        @if ($user->avatarImage)
          <div class="thumbnail">
            <img class="currentImage" src="{{$user->avatarImage->url}}" alt="" />
          </div>
        @else
          <div class="thumbnail">
            <img class="currentImage" src="..." alt="" />
          </div>
        @endif
        <a href="#" class="btn btn-default" type="button" id="imageUpload">
          {{trans('admin/forms.users.edit.image')}}
        </a>
      </div>
    </div>

  </div>

@endsection
