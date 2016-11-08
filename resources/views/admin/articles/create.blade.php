@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1>{{trans('admin/titles.articles.create')}}</h1>
    {!! Form::open(['action' => '\App\Http\Controllers\Admin\ArticlesController@store']) !!}
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            {!! Form::label('name', trans('admin/forms.articles.create.name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('tags', trans('admin/forms.articles.edit.tags')) !!}
            {!! Form::select('tags[]', $tags, null, ['class' => 'form-control', 'multiple' => true]) !!}
          </div>
          <div class="form-group">
            {!! Form::label('published_at', trans('admin/forms.articles.edit.published_at')) !!}
            {!! Form::date('published_at', Carbon\Carbon::now(), ['class' => 'form-control']) !!}
          </div>
        </div>
        <div class="col-sm-4">
          <div class="thumbnail">
            <img class="currentImage" src="" alt="" />
          </div>
          <a href="#" class="btn btn-default" type="button" id="imageUpload">
            {{trans('admin/forms.articles.create.image')}}
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="field">
            {!! Form::label('content', trans('admin/forms.articles.create.content')) !!}
            {!! Form::textarea('content', null, ['id' => 'richedit']) !!}
          </div>
          {!! Form::hidden('image-reference', null, ['id' => 'image-reference']) !!}
          {!! Form::submit(trans('admin/forms.articles.create.submit'), ['class' => 'btn btn-success submitBtn']) !!}
        </div>
      </div>
    {!! Form::close() !!}
    @include('admin.images.upload')

  </div>

@endsection
