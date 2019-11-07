<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
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
            <a href="{{ route('index') }}" class="nav-link">
              <i class="material-icons">house</i> Home
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="{{ route('order.create') }}" class="nav-link">
              <i class="material-icons">add_shopping_cart</i> New Order
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="order.html" class="nav-link">
              <i class="material-icons">shopping_basket</i> My Orders
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="profile.html" class="nav-link">
              <i class="material-icons">person</i> My Profile
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>