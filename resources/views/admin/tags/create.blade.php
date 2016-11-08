@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1>{{trans('admin/titles.tags.create')}}</h1>
    {!! Form::open(['action' => '\App\Http\Controllers\Admin\TagsController@store']) !!}
      <div class="form-group">
        {!! Form::label('name', trans('admin/forms.tags.create.name')) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('colour', trans('admin/forms.tags.create.color')) !!}
        {!! Form::text('colour', null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::submit(trans('admin/forms.tags.create.submit'), ['class' => 'btn btn-success submitBtn']) !!}
    {!! Form::close() !!}

  </div>

@endsection
