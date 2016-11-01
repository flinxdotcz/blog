@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.tags.edit')}}: <strong>{{$tag->name}}</strong></h1>
    <div class="ui form">
      {!! Form::model($tag, ['\App\Http\Controllers\Admin\TagsController@store', 'method' => 'PUT']) !!}
        <div class="field">
          {!! Form::label('id', trans('admin/forms.tags.edit.id')) !!}
          {!! Form::number('id', null, ['disabled' => 'disabled']) !!}
        </div>
        <div class="field">
          {!! Form::label('name', trans('admin/forms.tags.edit.name')) !!}
          {!! Form::text('name', null) !!}
        </div>
        {!! Form::submit(trans('admin/forms.tags.edit.submit'), ['class' => 'ui basic green button submitBtn']) !!}
      {!! Form::close() !!}
    </div>

  </div>

@endsection
