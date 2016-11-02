@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.users.edit')}}: <strong>{{$user->name}}</strong></h1>
    <div class="ui grid">
      <div class="two column row">
        <div class="thirteen wide column">
          <div class="ui form">
            {!! Form::model($user, ['action' => ['\App\Http\Controllers\Admin\UsersController@update', 'id' => $user->id], 'method' => 'PUT']) !!}
              <div class="field">
                {!! Form::label('id', trans('admin/forms.users.edit.id')) !!}
                {!! Form::number('id', null, ['disabled' => 'disabled']) !!}
              </div>
              <div class="field">
                {!! Form::label('name', trans('admin/forms.users.edit.name')) !!}
                {!! Form::text('name', null) !!}
              </div>
              <div class="field">
                {!! Form::label('username', trans('admin/forms.users.edit.username')) !!}
                {!! Form::text('username', null) !!}
              </div>
              <div class="field">
                {!! Form::label('newPassword', trans('admin/forms.users.edit.new_password')) !!}
                {!! Form::password('newPassword') !!}
              </div>
              <div class="field">
                {!! Form::label('repeatPassword', trans('admin/forms.users.edit.repeat_password')) !!}
                {!! Form::password('repeatPassword') !!}
              </div>

              {!! Form::hidden('image-reference', null, ['id' => 'image-reference']) !!}

              {!! Form::submit(trans('admin/forms.users.edit.submit'), ['class' => 'ui basic green button submitBtn']) !!}
            {!! Form::close() !!}
          </div>
        </div>
        <div class="three wide center aligned column">
          @include('admin.images.upload')
          @if ($user->avatarImage)
            <img class="ui medium image currentImage" src="{{$user->avatarImage->url}}" alt="" />
          @else
            <img class="ui medium image currentImage" src="..." alt="" />
          @endif
          <div class="ui divider"></div>
          <a href="#" class="ui primary basic medium button" type="button" id="imageUpload">
            {{trans('admin/forms.users.edit.image')}}
          </a>
        </div>
      </div>
    </div>

  </div>

@endsection
