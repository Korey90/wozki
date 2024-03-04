<nav class="navbar navbar-expand-lg bg-body-tertiary m-0 border">
  <div class="container">
    <a class="navbar-brand" href="{{ route('welcome') }}">
      <img src="https://cdn.shopify.com/s/files/1/0676/8921/8313/files/logo_transparent_background.png?v=1673957107&width=200" class="" alt="MisiaKasia.pl">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">


        <li class="nav-item">
          <a class="nav-link" href="{{ route('about-us') }}">O NAS</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('offer') }}">OFERTA</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('cooperation') }}">WSPOŁPRACA</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('dropshipping') }}">DROPSHIPPING</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('promotions') }}">PROMOCJE/AKTUALNOSCI</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('contactUs') }}">KONTAKT</a>
        </li>

        @guest
        <li class="nav-item">
          <a class="nav-link text-success" href="{{ route('register') }}">|| REJESTRACJA ||</a>
        </li>
        @endguest


        <div class="d-flex flex-row">

          <li class="nav-item mx-2">
              <i class="mdi mdi-magnify nav-link" id="formTriger"></i>
          </li>
          @auth
          <li class="nav-item mr-2">
            <a href="{{ route('user.dashboard') }}" class="nav-link">
              <i class="mdi mdi-account-outline"></i>
            </a>
          </li>
          <li class="nav-item mx-2">
            <a href="{{ route('store') }}" class="nav-link">
              <i class="mdi mdi-cart-outline"></i>              
            </a>
          </li>
          <li class="nav-item mx-2">
            <form action="{{ route('logout') }}" method="post" class="nav-link">
              @csrf
              @method('POST')
              <button type="submit" value="" style="background: none; padding: 0px; border: none;"><i class="mdi mdi-logout"></i></button>
            </form>
          </li>
          @elseguest
          <li class="nav-item mx-2">
              <a href="{{ route('login') }}" class="nav-link"><i class="mdi mdi-login"></i></a>
          </li>
            @endauth 

        </div>
      </ul>
    </div>
  </div>
</nav>
<script>
  function showForm() {
  var hiddenElement = document.getElementById('searchForm');
  hiddenElement.style.display = 'block';
  hiddenElement.style.display = 'flex';

  var inputElement = document.getElementById('searchInput');
    inputElement.focus();
}
var triggerElement = document.getElementById('formTriger');
triggerElement.addEventListener('click', showForm);
</script>