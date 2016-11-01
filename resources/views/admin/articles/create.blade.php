@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.articles.create')}}</h1>
    <div class="ui form">
      {!! Form::open(['action' => '\App\Http\Controllers\Admin\ArticlesController@store']) !!}
        <div class="ui grid">
          <div class="two column row">
            <div class="twelve wide column">
              <div class="field">
                {!! Form::label('name', trans('admin/forms.articles.create.name')) !!}
                {!! Form::text('name', null) !!}
              </div>
              <div class="field">
                {!! Form::label('tags', trans('admin/forms.articles.edit.tags')) !!}
                {!! Form::select('tags[]', $tags, null, ['class' => 'ui fluid search dropdown', 'multiple' => true]) !!}
              </div>
              <div class="field">
                {!! Form::label('published_at', trans('admin/forms.articles.edit.published_at')) !!}
                {!! Form::date('published_at', Carbon\Carbon::now()) !!}
              </div>
            </div>
            <div class="four wide center aligned column">
              <div class="thumbnail hidden" style="display: none;">
                <img class="ui medium image currentImage" src="" alt="" />
                <div class="ui hidden divider"></div>
              </div>
              <a href="#" class="ui primary basic large button" type="button" id="imageUpload">
                {{trans('admin/forms.articles.create.image')}}
              </a>
            </div>
          </div>
          <div class="one column row">
            <div class="column">
              <div class="field">
                {!! Form::label('content', trans('admin/forms.articles.create.content')) !!}
                {!! Form::textarea('content', null, ['id' => 'richedit']) !!}
              </div>
              {!! Form::hidden('image-reference', null, ['id' => 'image-reference']) !!}
              {!! Form::submit(trans('admin/forms.articles.create.submit'), ['class' => 'ui basic green button submitBtn']) !!}
            </div>
          </div>
        </div>
      {!! Form::close() !!}
      @include('admin.images.upload')
    </div>

  </div>

@endsection
