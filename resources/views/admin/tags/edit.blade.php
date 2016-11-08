@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1>{{trans('admin/titles.tags.edit')}}: <strong>{{$tag->name}}</strong></h1>
    {!! Form::model($tag, ['action' => ['\App\Http\Controllers\Admin\TagsController@update', 'id' => $tag->id], 'method' => 'PUT']) !!}
      <div class="form-group">
        {!! Form::label('id', trans('admin/forms.tags.edit.id')) !!}
        {!! Form::number('id', null, ['disabled' => 'disabled', 'class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('name', trans('admin/forms.tags.edit.name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('colour', trans('admin/forms.tags.edit.color')) !!}
        {!! Form::text('colour', null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::submit(trans('admin/forms.tags.edit.submit'), ['class' => 'btn btn-success submitBtn']) !!}
    {!! Form::close() !!}

  </div>

@endsection
