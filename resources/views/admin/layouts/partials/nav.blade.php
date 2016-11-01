<div class="ui inverted menu">
  <div class="ui container">
    <div class="item">
      {{ config('app.name', 'blog.app') }}
    </div>
    <div class="ui dropdown item">
      <div class="text">
        {{trans('admin/navbar.articles.label')}}
      </div>
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="{{action('\App\Http\Controllers\Admin\ArticlesController@index')}}">
          <i class="icon list"></i>{{trans('admin/navbar.articles.list')}}
        </a>
        <a class="item" href="{{action('\App\Http\Controllers\Admin\ArticlesController@create')}}">
          <i class="icon plus"></i>{{trans('admin/navbar.articles.new')}}
        </a>
      </div>
    </div>
    <div class="ui dropdown item">
      <div class="text">
        {{trans('admin/navbar.tags.label')}}
      </div>
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="{{action('\App\Http\Controllers\Admin\TagsController@index')}}">
          <i class="icon list"></i>{{trans('admin/navbar.tags.list')}}
        </a>
        <a class="item" href="{{action('\App\Http\Controllers\Admin\TagsController@create')}}">
          <i class="icon plus"></i>{{trans('admin/navbar.tags.new')}}
        </a>
      </div>
    </div>
    <div class="ui dropdown item">
      <div class="text">
        {{trans('admin/navbar.users.label')}}
      </div>
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="{{action('\App\Http\Controllers\Admin\UsersController@index')}}">
          <i class="icon list"></i>{{trans('admin/navbar.users.list')}}
        </a>
      </div>
    </div>
    <div class="ui dropdown item">
      <div class="text">
        {{trans('admin/navbar.images.label')}}
      </div>
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="{{action('\App\Http\Controllers\Admin\ImagesController@index')}}">
          <i class="icon list"></i>{{trans('admin/navbar.images.list')}}
        </a>
        <a class="item" href="{{action('\App\Http\Controllers\Admin\ImagesController@create')}}">
          <i class="icon plus"></i>{{trans('admin/navbar.images.new')}}
        </a>
      </div>
    </div>
    <div class="ui dropdown right item">
      <div class="text">
        {{trans('admin/navbar.settings.label')}}
      </div>
      <i class="dropdown icon"></i>
      <div class="menu">
        <div class="ui card">
          <div class="content">
            <div class="header">
              @if (Auth::user()->avatarImage)
                <img class="right floated ui avatar image" src="{{Auth::user()->avatarImage->url}}" />
              @endif
              <a href="{{action('\App\Http\Controllers\Admin\UsersController@show', ['id' => Auth::user()->id])}}">
              {{Auth::user()->name}}
            </div>
            <div class="meta">
              <p>
                {{Auth::user()->username}}
              </p>
              <p>
                {{Auth::user()->email}}
              </p>
            </div>
          </a>
          </div>
        </div>
        <div class="divider"></div>
        <a class="item" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          {{trans('admin/navbar.auth.logout')}}
        </a>
      </div>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>
