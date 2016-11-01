@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.tags.create')}}</h1>
    <div class="ui form">
      {!! Form::open(['route' => 'tagCreate']) !!}
        <div class="field">
          {!! Form::label('name', trans('admin/forms.tags.create.name')) !!}
          {!! Form::text('name', null) !!}
        </div>
        {!! Form::submit(trans('admin/forms.tags.create.submit'), ['class' => 'ui basic green button submitBtn']) !!}
      {!! Form::close() !!}
    </div>

  </div>

@endsection
