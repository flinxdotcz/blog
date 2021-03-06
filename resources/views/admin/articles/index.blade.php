@extends('admin.layouts.main')

@section('content')

  <div class="container-fluid">

    <h1 class="text-center">{{trans('admin/titles.articles.index')}}</h1>
    {{$articles->links()}}
    <table class="table table-striped table-bordered table-responsive table-hover">
      <thead>
        <tr>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@index', ['sortBy' => 'id', 'desc' => $desc])}}">
              {{ trans('admin/contents.articles.table.id') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@index', ['sortBy' => 'name', 'desc' => $desc])}}">
              {{ trans('admin/contents.articles.table.name') }}
            </a>
          </td>
          <td>
            {{ trans('admin/contents.articles.table.author') }}
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@index', ['sortBy' => 'published_at', 'desc' => $desc])}}">
              {{ trans('admin/contents.articles.table.published_at') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@index', ['sortBy' => 'created_at', 'desc' => $desc])}}">
              {{ trans('admin/contents.articles.table.created_at') }}
            </a>
          </td>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@index', ['sortBy' => 'updated_at', 'desc' => $desc])}}">
              {{ trans('admin/contents.articles.table.updated_at') }}
            </a>
          </td>
        </tr>
      </thead>
      <tbody>
        @foreach ($articles as $article)
          <tr id="a-{{$article->id}}">
            <td>
              {{$article->id}}
            </td>
            <td>
              <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@show', ['id' => $article->id])}}">
                {{$article->name}}
              </a>
              <div class="excerpt">
                {{$article->excerpt}}
              </div>
            </td>
            <td>
              <a href="{{action('\App\Http\Controllers\Admin\UsersController@show', ['id' => $article->user->id])}}" class="thumbnail avatar">
                @if ($article->user->avatarImage)
                    <img src="{{$article->user->avatarImage->url}}">
                @endif
                <small>{{$article->user->name}}</small>
              </a>
            </td>
            <td>
              {{$article->published_at}}
              @unless ($article->isPublished())
                <br>
                <span class="label label-info">
                  {{trans('admin/contents.articles.show.unpublished')}}
                </span>
              @endunless
            </td>
            <td>
              {{$article->created_at}}
            </td>
            <td>
              {{$article->updated_at}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{$articles->links()}}

  </div>

@endsection
