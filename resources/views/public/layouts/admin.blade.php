@include('layouts.partials.head')

<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-users"></i> {{trans('navbar.admin.users.label')}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="{{action('UsersController@indexAdmin')}}">{{trans('navbar.admin.users.list')}}</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-newspaper-o"></i> {{trans('navbar.admin.articles.label')}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="{{action('ArticlesController@indexAdmin')}}">{{trans('navbar.admin.articles.list')}}</a></li>
                      <li><a href="#">{{trans('navbar.admin.articles.new')}}</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-tags"></i> {{trans('navbar.admin.tags.label')}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="{{action('TagsController@indexAdmin')}}">{{trans('navbar.admin.tags.list')}}</a></li>
                      <li><a href="#">{{trans('navbar.admin.tags.new')}}</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-cog"></i> {{trans('navbar.admin.settings.label')}} <span class="caret"></span>
                    </a>
                    {{-- <ul class="dropdown-menu">
                      <li><a href="#">Link</a></li>
                    </ul> --}}
                  </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> {{trans('navbar.auth.homepage')}}</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{trans('navbar.auth.logout')}}
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
      @yield('content')
    </div>
</div>

@include('layouts.partials.footer')
