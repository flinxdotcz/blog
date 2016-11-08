@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1>{{trans('admin/titles.tags.index')}}</h1>
    <table class="table">
      <thead>
        <tr>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\TagsController@index', ['sortBy' => 'id', 'desc' => $desc])}}">
              {{ trans('admin/contents.tags.table.id') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\TagsController@index', ['sortBy' => 'name', 'desc' => $desc])}}">
              {{ trans('admin/contents.tags.table.name') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@index', ['sortBy' => 'created_at', 'desc' => $desc])}}">
              {{ trans('admin/contents.tags.table.created_at') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\TagsController@index', ['sortBy' => 'updated_at', 'desc' => $desc])}}">
              {{ trans('admin/contents.tags.table.updated_at') }}
            </a>
          </td>
        </tr>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
          <tr id="t-{{$tag->id}}">
            <td>
              {{$tag->id}}
            </td>
            <td>
              <h4>
                @if ($tag->avatarImage)
                  <div class="thumbnail">
                    <img src="{{$article->thumbnailImage->url}}" alt="{{$article->name}}" />
                  </div>
                @endif
                <a href="{{action('\App\Http\Controllers\Admin\TagsController@show', ['id' => $tag->id])}}">
                  {{$tag->name}}
                </a>
              </h4>
            </td>
            <td>
              {{$tag->created_at}}
            </td>
            <td>
              {{$tag->updated_at}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{$tags->links()}}

  </div>

@endsection
