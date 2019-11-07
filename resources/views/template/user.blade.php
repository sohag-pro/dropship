@include('partials.user.header')

<body class="@yield('type')-page sidebar-collapse">

  @include('partials.user.nav')

  @yield('content_top')
  
  @yield('content')

  @include('partials.user.footer')

  @include('partials.user.scripts')
  
