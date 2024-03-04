@extends('front.layout.layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



<div class="container d-flex">

@include('front.layout.menuBar')

<div class="container border">

  <div class="row p-2 m-2 lh-lg">
    
    <div class="d-flex justify-content-between">
      <p class="p-2 display-5">Witaj na mksi!</p>
      <p class="text-muted">Najlepszy Wholesaler w Polsce.</p>
    </div>


  </div>    



    
  <div class="row align-items-end mb-2">
        <div class="d-flex flex-column mb-2 align-items-center">
          <h2 class="text-center p-4">Wózki i Wózki Spacerowe - Znajdź Idealny Dla Siebie!</h2>
         <!-- <p><a href="{{ route('frontShow', 'wózki') }}" class="text-muted fs-5">Wiecej</a></p> -->
          <p class="w-75 fs-5 lead text-center">Przedstawiamy państwu naszą najnowszą kolekcję wózków i wózków spacerowych. Wybierając najlepsze marki na rynku, gwarantujemy komfort, bezpieczeństwo i styl dla Twojego malucha na każdym kroku.</p>
        </div>



          @forelse($randomProducts as $product)
        <div class="col-md m-2 p-0 ewe border rounded d-flex flex-column text-center">
            <div id="message{{ $product->id }}" class="alert alert-primary invisible"></div>
            <div style="width: 240px; height: 260px;" class="mx-auto d-flex align-items-center">
              <img class="" style="max-width: 240px; max-height: 260px;"  src="{{ asset($product->productPhotos->photo) }}" alt="'Brak Obrazka" >
            </div>


            <p class="fs-5 lh-base flex-fill">
              <a href="{{ route('front.product.show', $product->ean_number) }}" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                {{ Str::limit($product->title, 35, '...'); }}
              </a>
            </p> 

          @auth
            <div class="input-group flex-nowrap">
              <span class="input-group-text" id="addon-wrapping">{{ $product->price}} zł</span>
              <input type="number" id="item{{ $product->id }}" class="form-control" placeholder="" min="1" value="1" aria-label="Ilosc" aria-describedby="addon-wrapping">
              <span class="input-group-text" id="addon-wrapping" role="button" onClick="addToCart({{$product->id}}, 'item{{ $product->id }}', {{Auth::user()->id}}, '{{ 'message'.$product->id }}')"><i class="mdi mdi-cart-plus"></i></span>
            </div>
          @elseguest
            <hr>
            <p class="text-muted m-1">Musisz być zalogowany aby podziwiać nasze ceny</p>
          @endauth
        </div>
      @empty
         <p class="p-2 bg-warning ">
            Nic tu nie ma
         </p>
      @endforelse 
    </div><!-- /ROW -->

    <style>
        .ewe:hover {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15)!important; 
        }
        </style>  

    <div class="row align-items-end mb-2">
      <div class="mb-2 align-items-center">
        <h2 class="text-center p-4">Karmienie - Chwile Bliskości i Prawidłowego Rozwoju Twojego Dziecka!</h2>
         <!-- <p><a href="{{ route('frontShow', 'BUTELKI I KUBKI') }}" class="text-muted fs-5">Wiecej</a></p> -->
        <div class="row">
          <div class="col-md-6">
            <p class="fs-4 lh-1 lead text-center w-75 mx-auto">
              Karmienie to nie tylko zaspokojenie głodu Twojego malucha, ale przede wszystkim chwile bliskości, wsparcia i budowania więzi. Aby te chwile były pełne komfortu i przyjemności dla Ciebie i Twojego dziecka, przygotowaliśmy specjalny dział karmienia, w którym znajdziesz wszystko, czego potrzebujesz.
            </p>
          </div>
          <div class="col-md-6">
            <h4>W ofercie posiadamy:</h4>
            <ul>
              <li>🍼 Butelki i smoczki - Wybierz spośród szerokiej gamy produktów, które zapewniają naturalne doświadczenie karmienia. Nasze butelki są ergonomiczne, a smoczki stworzone tak, by naśladować kształt piersi, ułatwiając maluchowi ssanie.</li>
              <li>🍴 Naczynia i sztućce dla dzieci - Bezpieczne, kolorowe i funkcjonalne – idealne do nauki samodzielnego jedzenia.</li>
              <li>🥣 Krzesełka do karmienia - Bezpieczne, wygodne i łatwe do czyszczenia. Spraw, by posiłki były pełne radości, a nie bałaganu!</li>
              <li>🍏 Akcesoria do karmienia - Od podgrzewaczy butelek, przez maty pod krzesełko, aż po przenośne pojemniki na przekąski. Wszystko, co ułatwi Ci życie w drodze i w domu.</li>
            </ul>
            <p class="lead text-center">
              W naszym dziale karmienia stawiamy na jakość, bezpieczeństwo i funkcjonalność. Dbamy o to, by każdy produkt był dopasowany do potrzeb Twojego dziecka, wspierając jego prawidłowy rozwój i ułatwiając Ci codzienną opiekę. Odkryj świat karmienia pełen komfortu i bliskości. Zapraszamy do zapoznania się z naszą ofertą!
            </p>
          </div>
        </div>
      </div>
  
      @forelse($randomBottels as $product)
      <div class="col-md m-2 p-0 ewe border rounded d-flex flex-column text-center">
            <div id="message{{ $product->id }}" class="alert alert-primary d-none"></div>
            <div style="width: 240px; height: 260px; display:block;" class="d-flex align-items-center justify-content-center">
              <img class="" style="max-width: 240px; max-height: 260px;"  src="{{ asset($product->productPhotos->photo) }}" alt="Brak Obrazka" >
            </div>

            <p class="fs-5 lh-base flex-fill">
              <a href="{{ route('front.product.show', $product->ean_number) }}" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                {{ Str::limit($product->title, 35, '...'); }}
              </a>
            </p> 

          @auth
            <div class="input-group flex-nowrap">
              <span class="input-group-text" id="addon-wrapping">{{ $product->price}} zł</span>
              <input type="number" id="item{{ $product->id }}" class="form-control" placeholder="" min="1" value="1" aria-label="Ilosc" aria-describedby="addon-wrapping">
              <span class="input-group-text" id="addon-wrapping" role="button" onClick="addToCart({{$product->id}}, 'item{{ $product->id }}', {{Auth::user()->id}}, '{{ 'message'.$product->id }}')"><i class="mdi mdi-cart-plus"></i></span>
            </div>
          @elseguest
            <hr>
            <p class="text-muted m-1 ">Musisz być zalogowany aby podziwiać nasze ceny</p>
          @endauth
        </div>
      @empty
         <p class="p-2 bg-warning ">
            Nic tu nie ma
         </p>
      @endforelse
      <p class="p-2"><a href="{{ route('frontShow', 'KARMIENIE') }}" class="text-muted fs-5">Pokaż Wszystkie</a></p>
    </div><!-- /row -->

    <div class="row align-items-end mb-2">

<div class="mb-2 align-items-center">
  <h2 class="text-center p-4">Smoczki - Komfort i Spokój dla Twojego Malucha!</h2>
 <!-- <p><a href="{{ route('frontShow', 'smoczki') }}" class="text-muted fs-5">Wiecej</a></p> -->
 <div class="row">
  <div class="col-md-6">
    <h3 class="text-center">Nasze smoczki to:</h3>
    <ul>
      <li><b class="fs-6">Jakość</b> - Wszystkie nasze smoczki wykonane są z wysokiej jakości materiałów, które są bezpieczne dla wrażliwej skóry dziecka.</li>
      <li><b class="fs-6">Ergonomia</b> - Kształt i design naszych smoczków zostały zaprojektowane tak, aby idealnie pasować do ust Twojego dziecka, promując zdrowy rozwój szczęki.</li>
      <li><b class="fs-6">Bezpieczeństwo</b> - Wszystkie nasze smoczki są wolne od BPA i innych szkodliwych substancji.</li>
      <li><b class="fs-6">Wiele wzorów i kolorów</b> - Wybierz spośród szerokiej gamy wzorów i kolorów, które zachwycą zarówno Ciebie, jak i Twoje dziecko.</li>
    </ul>
  </div>
  <div class="col-md-6 align-items-center">
    <p class="fs-3 lh-1 lead text-center">Znalezienie idealnego smoczka dla Twojego dziecka może być nie lada wyzwaniem. Dlatego przygotowaliśmy dla Ciebie specjalną ofertę, składającą się z najlepszych marek i modeli dostępnych na rynku. Nasza kolekcja smoczków zapewni Twojemu maluchowi komfort i bezpieczeństwo, a Tobie spokój umysłu.</p>
  </div>
 </div>
 </div>
@forelse($randomSmoczki as $product)
<div class="col-md m-2 p-0 ewe border rounded d-flex flex-column text-center">
            <div id="message{{ $product->id }}" class="alert alert-primary d-none"></div>
            <div style="width: 240px; height: 260px; display:block;" class="d-flex align-items-center justify-content-center">
              <img class="" style="max-width: 240px; max-height: 260px;"  src="{{ asset($product->productPhotos->photo) }}" alt="Brak Obrazka" >
            </div>


            <p class="fs-5 lh-base flex-fill">
              <a href="{{ route('front.product.show', $product->ean_number) }}" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                {{ Str::limit($product->title, 35, '...'); }}
              </a>
            </p> 

          @auth
            <div class="input-group flex-nowrap">
              <span class="input-group-text" id="addon-wrapping">{{ $product->price}} zł</span>
              <input type="number" id="item{{ $product->id }}" class="form-control" placeholder="" min="1" value="1" aria-label="Ilosc" aria-describedby="addon-wrapping">
              <span class="input-group-text" id="addon-wrapping" role="button" onClick="addToCart({{$product->id}}, 'item{{ $product->id }}', {{Auth::user()->id}}, '{{ 'message'.$product->id }}')"><i class="mdi mdi-cart-plus"></i></span>
            </div>
          @elseguest
            <hr>
            <p class="text-muted m-1 ">Musisz być zalogowany aby podziwiać nasze ceny</p>
          @endauth
        </div>
      @empty
         <p class="p-2 bg-warning ">
            Nic tu nie ma
         </p>
      @endforelse 
      <p class="p-2"><a href="{{ route('frontShow', 'SMOCZKI') }}" class="text-muted fs-5">Pokaż Wszystkie</a></p>
</div><!-- /ROW -->


<div class="row">
    <div class="text-center mb-2 align-items-center">
      <h2 class="text-center p-4">Nasze Marki</h2>
    </div>

  
    <div id="carouselExampleControls" class="carousel slide carousel-fade mb-2" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach($chunks as $key => $chunk)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="row">
              @foreach($chunk as $brand)
                <div class="col-md d-flex align-items-center" style="height: 250px;">
                  <a href="{{ route('frontShow', $brand->name) }}">
                    <img src="{{ asset($brand->logo) }}" class="d-block w-100" alt="Brak Obrazka">
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <p><a href="" class="text-muted fs-5">Pokaż Wszystkie (do zrobienia widok)</a></p>
  </div><!-- nasze marki -->


</div>



</div><!-- /main Container -->

@endsection('content')