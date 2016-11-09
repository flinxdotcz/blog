@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1 class="text-center">{{trans('admin/titles.tags.index')}}</h1>
    {{$tags->links()}}
    <table class="table table-striped table-bordered table-responsive table-hover">
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
              <a href="{{action('\App\Http\Controllers\Admin\TagsController@show', ['id' => $tag->id])}}">
                {{$tag->name}}
              </a>
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
