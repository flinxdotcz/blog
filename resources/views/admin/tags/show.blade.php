@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <div class="ui grid">
      <div class="two column row">
        <div class="nine wide column">
          <h1 class="ui header">{{$tag->name}}</h1>
        </div>
        <div class="four wide right aligned right floated column">
          <div class="ui buttons">
            <a href="{{action('\App\Http\Controllers\Admin\TagsController@edit', ['id' => $tag->id])}}" class="ui primary basic button">
              <i class="icon paint brush"></i>{{trans('admin/contents.tags.show.edit')}}
            </a>
            @include('admin/layouts.partials.modal', [
              'delete' => true,
              'action' => '\App\Http\Controllers\Admin\TagsController@destroy',
              'id' => $tag->id,
              'header' => trans('admin/modals.tags.delete.header'),
              'message' => trans('admin/modals.tags.delete.message'),
              'approve' => trans('admin/modals.tags.delete.approve')
            ])
            <button class="ui negative button deleteBtn">
              <i class="icon remove"></i>{{trans('admin/contents.tags.show.delete')}}
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="ui grid">
      <div class="two column row">
        <div class="column">
          <div class="ui list">
            <div class="item">
              <div class="content">
                <i class="icon hashtag"></i> <strong>{{trans('admin/contents.tags.show.id')}}:</strong> {{$tag->id}}
              </div>
            </div>
            <div class="item">
              <div class="content">
                <div class="ui statistic">
                  <div class="value">
                    {{$tag->articles->count()}}
                  </div>
                  <div class="label">
                    {{trans('admin/contents.tags.show.articles')}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="right aligned column">
          <div class="ui list">
            <div class="item">
              <div class="content">
                <i class="icon paint brush"></i> <strong>{{trans('admin/contents.tags.show.updated_at')}}: </strong>
                {{$tag->updated_at}}
              </div>
            </div>
            <div class="item">
              <div class="content">
                <i class="icon arrow up"></i> <strong>{{trans('admin/contents.tags.show.created_at')}}: </strong>
                {{$tag->created_at}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
