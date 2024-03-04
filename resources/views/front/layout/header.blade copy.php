<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary m-0 border">
  <div class="container">
    <a class="navbar-brand" href="{{ route('store') }}">
      <img src="https://cdn.shopify.com/s/files/1/0676/8921/8313/files/logo_transparent_background.png?v=1673957107&width=200" class="" alt="MisiaKasia.pl">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            DLA MALUSZKA
          </a>
          <ul class="dropdown-menu border">
            <li><a class="dropdown-item py-2 px-4" href="#">AKCESORIA DO KAPIELI</a></li>
            <li><a class="dropdown-item py-2 px-4" href="#">ARTYKULY HIGIENICZNE</a></li>
            <li><a class="dropdown-item py-2 px-4" href="#">GRZECHOTKI</a></li>
            <li><a class="dropdown-item py-2 px-4" href="#">SZCZOTECZKI I PASTY DO ZEBOW</a></li>
            <li><a class="dropdown-item py-2 px-4" href="#">MATY DO PRZEWIJANIA</a></li>
            <li><a class="dropdown-item py-2 px-4" href="#">WLOSY DZIECKA</a></li>
            <li><a class="dropdown-item py-2 px-4" href="#">NOCNIKI I NAKLADKI DEDESOWE</a></li>
            <li><a class="dropdown-item py-2 px-4" href="#">RECZNIKI I OKRYCIA KAPIELOWE</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SMOCZKI
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">SMOCZKI 0-6 MIESIECY</a></li>
            <li><a class="dropdown-item" href="#">SMOCZKI 6-18 MIESIECY</a></li>
            <li><a class="dropdown-item" href="#">SMOCZKI 18-36 MIESIECY</a></li>
            <li><a class="dropdown-item" href="#">AKCESORIA DO SMOCZKOW</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            KARMIENIE DZIECKA
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">BUTELKI DO KARMIENIA</a></li>
            <li><a class="dropdown-item" href="#">SMOCZKI DO BUTELEK</a></li>
            <li><a class="dropdown-item" href="#">KUBKI I BIDONY</a></li>
            <li><a class="dropdown-item" href="#">TALARZYKI I MISECZKI</a></li>
            <li><a class="dropdown-item" href="#">SZTUCCE DLA DZIECI</a></li>
            <li><a class="dropdown-item" href="#">SLINIAKI I FARTUSZKI</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ZABAWKI
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">ZABAWKI EDUKACYJNE</a></li>
            <li><a class="dropdown-item" href="#">GRY I PUZZLE</a></li>
            <li><a class="dropdown-item" href="#">ZABAWKI PLUSZOWE</a></li>
            <li><a class="dropdown-item" href="#">KSIEZECZKI DLA DZIECI</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            DLA RODZICOW
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">LAKTATOR I AKCESORIA</a></li>
            <li><a class="dropdown-item" href="#">PODKLADY I MATY POPORODOWE</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MEBLE DZIECIECE
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">LOZECZKA</a></li>
            <li><a class="dropdown-item" href="#">KOMODY</a></li>
            <li><a class="dropdown-item" href="#">STOLIKI I KRZESELKA</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">WIECEJ</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">BLOG</a>
        </li>

        <li class="nav-item">
          <a href="{{ route('user.settings') }}" class="nav-link">
            <i class="mdi mdi-account-outline"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="mdi mdi-magnify"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('cart.index') }}" class="nav-link">
            <i class="mdi mdi-cart-outline"></i>              
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="mdi mdi-logout"></i>              
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

