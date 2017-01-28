@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">


    <h1 class="text-center">
      @if (isset($tag->colour))
        <span class="tag-label" style="background-color: #{{$tag->colour}};"></span>
      @endif
      {{$tag->name}}
    </h1>
    <hr>
    <div class="row">
      <div class="col-xs-12">
        <div class="buttons">
          <a href="{{action('\App\Http\Controllers\Admin\TagsController@edit', ['id' => $tag->id])}}" class="btn btn-default">
            {{trans('admin/contents.tags.show.edit')}}
          </a>
          @include('admin/layouts.partials.modal', [
            'delete' => true,
            'action' => '\App\Http\Controllers\Admin\TagsController@destroy',
            'id' => $tag->id,
            'header' => trans('admin/modals.tags.delete.header'),
            'message' => trans('admin/modals.tags.delete.message'),
            'approve' => trans('admin/modals.tags.delete.approve')
          ])
          <button class="btn btn-danger deleteBtn">
            {{trans('admin/contents.tags.show.delete')}}
          </button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <div class="list">
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.tags.show.id')}}:</strong> {{$tag->id}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.tags.show.slug')}}:</strong> {{$tag->slug}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.tags.show.articles')}}: </strong>
              {{$tag->articles->count()}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 text-right">
        <div class="list">
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.tags.show.updated_at')}}: </strong>
              {{$tag->updated_at}}
            </div>
          </div>
          <div class="item">
            <div class="content">
              <strong>{{trans('admin/contents.tags.show.created_at')}}: </strong>
              {{$tag->created_at}}
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
