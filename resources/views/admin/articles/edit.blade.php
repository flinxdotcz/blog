@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1>{{trans('admin/titles.articles.edit')}}: <strong>{{$article->name}}</strong></h1>
    {!! Form::model($article, ['action' => ['\App\Http\Controllers\Admin\ArticlesController@update', 'id' => $article->id], 'method' => 'PUT']) !!}
    <div class="row">
      <div class="col-sm-8">
        <div class="form-group">
          {!! Form::label('id', trans('admin/forms.articles.edit.id')) !!}
          {!! Form::number('id', null, ['disabled' => 'disabled', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('name', trans('admin/forms.articles.edit.name')) !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('tags', trans('admin/forms.articles.edit.tags')) !!}
          {!! Form::select('tags[]', $tags, $article->tags->pluck('id')->toArray(), ['class' => 'form-control', 'multiple' => true]) !!}
        </div>
        <div class="form-group">
          {!! Form::label('published_at', trans('admin/forms.articles.edit.published_at')) !!}
          {!! Form::date('published_at', $article->published_at, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          @if ($article->thumbnailImage)
            <img class="currentImage" src="{{$article->thumbnailImage->url}}" alt="" />
          @else
            <img class="currentImage" src="..." alt="" />
          @endif
        </div>
        <a href="#" class="btn btn-default" type="button" id="imageUpload">
          {{trans('admin/forms.articles.edit.image')}}
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="form-group">
          {!! Form::label('content', trans('admin/forms.articles.edit.content')) !!}
          {!! Form::textarea('content', null, ['id' => 'richedit']) !!}
        </div>
        {!! Form::hidden('image-reference', null, ['id' => 'image-reference']) !!}
        {!! Form::submit(trans('admin/forms.articles.edit.submit'), ['class' => 'btn btn-success submitBtn']) !!}
      </div>
    </div>
    {!! Form::close() !!}
    @include('admin.images.upload')

  </div>

@endsection
