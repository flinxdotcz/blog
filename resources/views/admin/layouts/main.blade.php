@include('admin.layouts.partials.head')

@include('admin.layouts.partials.nav')

@include('admin.layouts.partials.notifications')
<div class="ui hidden divider"></div>

@yield('content')

@include('admin.layouts.partials.footer')
