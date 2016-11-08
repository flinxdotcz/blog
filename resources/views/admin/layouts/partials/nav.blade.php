<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar-admin">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-admin" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{$view == 'admin' ? route('home') : route('admin')}}">
        {{ config('app.name', 'blog.app') }}
      </a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('admin/navbar.articles.label')}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a class="item" href="{{action('\App\Http\Controllers\Admin\ArticlesController@index')}}">
                {{trans('admin/navbar.articles.list')}}
              </a>
            </li>
            <li>
              <a class="item" href="{{action('\App\Http\Controllers\Admin\ArticlesController@create')}}">
                {{trans('admin/navbar.articles.new')}}
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('admin/navbar.tags.label')}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a class="item" href="{{action('\App\Http\Controllers\Admin\TagsController@index')}}">
                {{trans('admin/navbar.tags.list')}}
              </a>
            </li>
            <li>
              <a class="item" href="{{action('\App\Http\Controllers\Admin\TagsController@create')}}">
                {{trans('admin/navbar.tags.new')}}
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('admin/navbar.users.label')}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a class="item" href="{{action('\App\Http\Controllers\Admin\UsersController@index')}}">
                {{trans('admin/navbar.users.list')}}
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('admin/navbar.images.label')}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a class="item" href="{{action('\App\Http\Controllers\Admin\ImagesController@index')}}">
                {{trans('admin/navbar.images.list')}}
              </a>
            </li>
            <li>
              <a class="item" href="{{action('\App\Http\Controllers\Admin\ImagesController@create')}}">
                {{trans('admin/navbar.images.new')}}
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('admin/navbar.settings.label')}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{action('\App\Http\Controllers\Admin\UsersController@show', ['id' => Auth::user()->id])}}">{{Auth::user()->name}}</a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
              <a class="item" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{trans('admin/navbar.auth.logout')}}
              </a>
            </li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
