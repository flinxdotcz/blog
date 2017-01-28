@include('public.theme.partials.head')
@include('partials.navbar')
@yield('content')
@unless (isset($loginRoute) && $loginRoute === true)
  @include('public.theme.partials.footer')
@endunless
