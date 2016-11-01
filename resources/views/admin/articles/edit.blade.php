@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.articles.edit')}}: <strong>{{$article->name}}</strong></h1>
    <div class="ui form">
      {!! Form::model($article, ['\App\Http\Controllers\Admin\ArticlesController@store', 'method' => 'PUT']) !!}
        <div class="ui grid">
          <div class="two column row">
            <div class="twelve wide column">
              <div class="field">
                {!! Form::label('id', trans('admin/forms.articles.edit.id')) !!}
                {!! Form::number('id', null, ['disabled' => 'disabled']) !!}
              </div>
              <div class="field">
                {!! Form::label('name', trans('admin/forms.articles.edit.name')) !!}
                {!! Form::text('name', null) !!}
              </div>
              <div class="field">
                {!! Form::label('tags', trans('admin/forms.articles.edit.tags')) !!}
                {!! Form::select('tags[]', $tags, $article->tags->pluck('id')->toArray(), ['class' => 'ui fluid search dropdown', 'multiple' => true]) !!}
              </div>
            </div>
            <div class="four wide center aligned column">
              <div class="thumbnail">
                @if ($article->thumbnailImage)
                  <img class="ui medium image currentImage" src="{{$article->thumbnailImage->url}}" alt="" />
                @else
                  <img class="ui medium image currentImage" src="..." alt="" />
                @endif
                <div class="ui divider"></div>
              </div>
              <a href="#" class="ui primary basic medium button" type="button" id="imageUpload">
                {{trans('admin/forms.articles.edit.image')}}
              </a>
            </div>
          </div>
          <div class="one column row">
            <div class="column">
              <div class="field">
                {!! Form::label('content', trans('admin/forms.articles.edit.content')) !!}
                {!! Form::textarea('content', null, ['id' => 'richedit']) !!}
              </div>
              {!! Form::hidden('image-reference', null, ['id' => 'image-reference']) !!}
              {!! Form::submit(trans('admin/forms.articles.edit.submit'), ['class' => 'ui basic green button submitBtn']) !!}
            </div>
          </div>
        </div>
      {!! Form::close() !!}
      @include('admin.images.upload')
    </div>

  </div>

@endsection
