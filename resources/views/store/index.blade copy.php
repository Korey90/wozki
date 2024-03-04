@extends('front.layout.layout')
     

@section('content')

      <div class="row mb-0" style="background-color: #006d7e;">
  <p class="text-center fw-bold text-light p-3 m-0">
    Zrób zakupy za minimum 99 zł i skorzystaj z opcji darmowej dostawy z kodem DARMOWA99
  </p>
</div>

      



    <div class="">
      <!-- carusel -->
      <div id="carouselExampleCaptions" class="carousel carousel-fade slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          @foreach ($carousel as $slide)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true" aria-label="Slide {{ $slide->id }}"></button>
          @endforeach

        </div>
        <div class="carousel-inner">
          @foreach ($carousel as $slide)
            <div class="carousel-item @if ($loop->first) active @endif">
              <img src="{{ url('storage/'.$slide->image) }}" class="d-block w-100" style="max-height: 520px;" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h4 class="text-uppercase font-weight-bolder">{{ $slide->title }}</h4>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
          @endforeach
  
       
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- /end carusel -->
    </div><!-- /end Container-fluid -->

    <div class="container my-1">
      <h2 class="w-100 text-left">Promocje</h2>
      <div class="d-flex justify-content-between">
        <div class="card text-white w-100 m-2">
          <img src="https://9.allegroimg.com/original/12e07a/c56d30074bd8bd5178beb1f9f049" class="card-img" alt="...">
          <div class="card-img-overlay">
            <h3 class="card-title">FOR BOYS</h3>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text btn btn-primary">Show Now!</p>
          </div>
        </div>

        <div class="card text-white w-100 m-2 border-0">
          <img src="https://i.wpimg.pl/O/860x440/d.wpimg.pl/1941929872-1015288680/domek-dla-lalek.jpg" class="card-img" alt="...">
          <div class="card-img-overlay">
            <h3 class="card-title">FOR GIRLS</h3>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text btn btn-success aligh-self-end">Shop Now!</p>
          </div>
        </div>
      </div>
    </div><!-- /End container forboys/for girls -->

    <div class="container">
        <h2 class="text-center my-5">Featured Products</h2>


        <div class="card-group d-flex justify-content-between text-center">
            <div class="card m-1">
              <img src="https://loremflickr.com/860/440/toys" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-uppercase">EastSun Educational House toy</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text">
                    <i class="btn btn-outline mdi mdi-cart-outline"></i>
                    <i class="btn mdi mdi-star-outline"></i>
                        <small class="text-muted mdi mdi-currency-gbp">21.99</small>
                </p>
              </div>
            </div>
            <div class="card m-1">
              <img src="https://loremflickr.com/860/440/tom&jerry" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-uppercase">EastSun Cart Pack 3 vechicles in 1 box</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text">
                  <i class="btn btn-outline mdi mdi-cart-outline"></i>
                  <i class="btn mdi mdi-star-outline"></i>
                      <small class="text-muted mdi mdi-currency-gbp">20.00</small>
                </p>
              </div>
            </div>
            <div class="card m-1">
              <img src="https://loremflickr.com/860/440/cars" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-uppercase">LEGO Mat super play music</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even first to show that equal height action.</p>
                <p class="card-text">
                  <i class="btn btn-outline mdi mdi-cart-outline"></i>
                  <i class="btn mdi mdi-star-outline"></i>
                      <small class="text-muted mdi mdi-currency-gbp">16.40</small>
                </p>
              </div>
            </div>

            <div class="card m-1">
                <img src="https://loremflickr.com/860/440/lego" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title text-uppercase">Lego Grzechotki tytul produktu widziany na stronie kupca</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                  <p class="card-text">
                    <i class="btn btn-outline mdi mdi-cart-outline"></i>
                    <i class="btn mdi mdi-star-outline"></i>
                        <small class="text-muted mdi mdi-currency-gbp">8.99</small>
                  </p>
                </div>
              </div>
          </div>

    </div><!-- /end container FEATURED products -->

    <div class="container">
      <h2 class="text-center my-5">Product Clerance</h2>


      <div class="card-group text-center">
          <div class="card m-1">
            <img src="https://loremflickr.com/860/440/fiat" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-uppercase">EastSun Educational House toy</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text">
                  <i class="btn btn-outline mdi mdi-cart-outline"></i>
                  <i class="btn mdi mdi-star-outline"></i>
                      <small class="text-muted mdi mdi-currency-gbp">21.99</small>
              </p>
            </div>
          </div>
          <div class="card m-1 text-center">
            <img src="https://loremflickr.com/860/440/bmw" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-uppercase">EastSun Cart Pack 3 vechicles in 1 box</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text">
                <i class="btn btn-outline mdi mdi-cart-outline"></i>
                <i class="btn mdi mdi-star-outline"></i>
                    <small class="text-muted mdi mdi-currency-gbp">20.00</small>
              </p>
            </div>
          </div>
          <div class="card m-1 text-center">
            <img src="https://loremflickr.com/860/440/porshe" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-uppercase">LEGO Mat super play music</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even first to show that equal height action.</p>
              <p class="card-text">
                <i class="btn btn-outline mdi mdi-cart-outline"></i>
                <i class="btn mdi mdi-star-outline"></i>
                    <small class="text-muted mdi mdi-currency-gbp">16.40</small>
              </p>
            </div>
          </div>

          <div class="card m-1 text-center">
              <img src="https://loremflickr.com/860/440/audi" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-uppercase">Lego Grzechotki tytul produktu widziany na stronie kupca</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text">
                  <i class="btn btn-outline mdi mdi-cart-outline"></i>
                  <i class="btn mdi mdi-star-outline"></i>
                      <small class="text-muted mdi mdi-currency-gbp">8.99</small>
                </p>
              </div>
            </div>
        </div>

    </div><!-- /konice Product Clerance -->

    <div class="container d-flex ustify-content-between my-1">
        <div class="card bg-dark text-white w-100 m-2">
            <img src="https://loremflickr.com/860/440/star_wars" class="card-img" alt="...">
            <div class="card-img-overlay">
              <h3 class="card-title">LEGO STAR WARS</h3>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text btn btn-primary">Show Now!</p>
            </div>
          </div>

          <div class="card bg-dark text-white w-100 m-2">
            <img src="https://loremflickr.com/860/440/pokemon" class="card-img" alt="...">
            <div class="card-img-overlay">
              <h3 class="card-title">POKEMON</h3>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text btn btn-success aligh-self-end">Shop Now!</p>
            </div>
          </div>
    </div><!-- /End container forboys/for girls -->

    

    @endsection

