<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/') }}">
          SendCargo </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="material-icons">house</i> Home
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('order.create') }}" class="nav-link">
              <i class="material-icons">add_shopping_cart</i> New Order
            </a>
          </li>
          @guest
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link">
                <i class="material-icons">fingerprint</i> {{ __('Login') }}
              </a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                  <a href="{{ route('register') }}" class="nav-link">
                    <i class="material-icons">person_add</i> {{ __('Register') }}
                  </a>
                </li>
            @endif
          @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a href="profile.html" class="nav-link">
                      <i class="material-icons">person</i> My Profile
                    </a>
                    <a href="order.html" class="nav-link">
                      <i class="material-icons">shopping_basket</i> My Orders
                    </a>
                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="material-icons">directions_run</i>{{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  {{-- <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a> --}}
                </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>