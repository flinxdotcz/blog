@extends('admin.layouts.main')

@section('content')

  <div class="ui container">

    <h1 class="ui header">{{trans('admin/titles.articles.index')}}</h1>
    <table class="ui very basic table">
      <thead>
        <tr>
          <td>
            <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@index', ['sortBy' => 'name', 'desc' => $desc])}}">
              {{ trans('admin/contents.articles.table.name') }}
            </a>
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
              <h4 class="ui image header">
                @if ($article->avatarImage)
                  <img class="ui mini circular image" src="{{$article->avatarImage->url}}" alt="{{$article->avatarImage->name}}" />
                @endif
                <div class="content">
                  <a href="{{action('\App\Http\Controllers\Admin\ArticlesController@show', ['id' => $article->id])}}">
                    {{$article->name}}
                  </a>
                  <div class="sub header">
                    {{$article->excerpt}}
                  </div>
                </div>
              </h4>
            </td>
            <td>
              {{$article->published_at->toFormattedDateString()}}
              <br>
              @unless ($article->isPublished())
                <div class="ui mini purple basic label">
                  <i class="icon hide"></i>{{trans('admin/contents.articles.show.unpublished')}}
                </div>
              @endunless
            </td>
            <td>
              {{$article->created_at->toFormattedDateString()}}
            </td>
            <td>
              {{$article->updated_at->toFormattedDateString()}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{$articles->links()}}

  </div>

@endsection
