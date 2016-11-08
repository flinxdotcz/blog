@include('admin.layouts.partials.head')

@include('admin.layouts.partials.nav', ['view' => 'admin'])

@include('admin.layouts.partials.notifications')

@yield('content')

@include('admin.layouts.partials.footer')
