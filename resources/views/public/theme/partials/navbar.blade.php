<nav class="main-navigation navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
      </a>
    </div>
    <div class="collapse navbar-collapse" id="main-navbar">
      @if(!empty($tags))
        <ul class="nav navbar-nav">
          @foreach ($tags as $tag)
            <li><a href="{{route('tag', $tag->slug)}}">{{$tag->name}}</a></li>
          @endforeach
        </ul>
      @endif
      @unless (Auth::check())
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="{{url('/login')}}"><i class="fa fa-user"></i></a>
          </li>
        </ul>
      @endunless
    </div>
  </div>
</nav>
