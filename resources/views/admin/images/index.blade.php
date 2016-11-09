@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1 class="text-center">{{trans('admin/titles.images.index')}}</h1>
    @if ($images->count())
      <div class="row">
        @foreach ($images as $image)
          <div class="col-sm-4">
            <div class="thumbnail image-block">
              <img src="{{$image->url}}" alt="{{$image->name}}" />
              <div class="caption">
                <h3>{{$image->name}}</h3>
                <hr>
                @unless (Auth::user()->id === $image->user->id)
                  <div class="author">
                    {{$image->user->name}}
                  </div>
                @endunless
                <div class="description">
                  {{$image->description}}
                </div>
                <div class="created-at">
                  {{$image->created_at}}
                </div>
              </div>
              @include('admin/layouts.partials.modal', [
                'delete' => true,
                'action' => '\App\Http\Controllers\Admin\ImagesController@destroy',
                'id' => $image->id,
                'header' => trans('admin/modals.images.delete.header'),
                'message' => trans('admin/modals.images.delete.message'),
                'approve' => trans('admin/modals.images.delete.approve')
              ])
              <button class="btn btn-danger deleteBtn">
                {{trans('admin/contents.images.index.delete')}}
              </button>
            </div>
            </div>
        @endforeach
      </div>
    @endif

    {{$images->links()}}

  </div>

@endsection
