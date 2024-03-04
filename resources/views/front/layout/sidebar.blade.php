<a class="btn btn-primary opacity-50" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  |||
</a>
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <ul class="nav">
          <li class="nav-item d-flex justify-content-between">
              <h3 class="menu-title ml-2">Menu</h3><button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.dashboard') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.profileDetails') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Dane Profilowe</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.companySettings') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Moja Firma</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.accountSettings') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Ustawienia Konta</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('store') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Koszyk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.orders.index') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Moje Zamowienia</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Privacy settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.deliveryAddress') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Adresy dostaw</span>
            </a>
          </li>
          @if(auth()->user()->id !== 5)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Admin Dash</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('stripe.index') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Stripe</span>
            </a>
          </li>
        </ul>
      </nav>