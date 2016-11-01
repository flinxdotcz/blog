@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.tags.index')}}</h1>
    <table class="ui very basic table">
      <thead>
        <tr>
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
              <h4 class="ui image header">
                @if ($tag->avatarImage)
                  <img class="ui mini circular image" src="{{$article->avatarImage->url}}" alt="{{$article->avatarImage->name}}" />
                @endif
                <div class="content">
                  <a href="{{action('\App\Http\Controllers\Admin\TagsController@show', ['id' => $tag->id])}}">
                    {{$tag->name}}
                  </a>
                </div>
              </h4>
            </td>
            <td>
              {{$tag->created_at->toFormattedDateString()}}
            </td>
            <td>
              {{$tag->updated_at->toFormattedDateString()}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{$tags->links()}}

  </div>

@endsection
