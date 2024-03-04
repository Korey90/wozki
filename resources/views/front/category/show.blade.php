@extends('front.layout.layout')

@section('content')
<div class="container d-flex">
@include('front.layout.menuBar')

<div class="container border">

    <div class="d-flex justify-content-between">
      <p class="p-2 display-5">Kategoria: <small class="text-muted">    {{ $category->name }}</small> <small class="fs-4">({{ $category->products->count() }} produktów)</small></p>
    </div>
    
    <div class="row">
      @forelse($category->products as $product)
        <div class="col-md-4 p-3 d-flex flex-column">
          <div id="message{{ $product->id }}" class="alert alert-primary invisible"></div>
          @if($product->productPhotos->first()->photo !== null)
            <img class="mb-auto h-100" src="{{ url(htmlspecialchars($product->productPhotos->first()->photo)) }}" style="width: 100%; max-height: 350px;" alt="obrazek" />
          @else
            <p class="mb-auto h-100 fs-5">Brak Zdjęć tego produku</p>
          @endif
          <p class="fs-5 lh-base mt-auto">
            <a href="{{ route('front.product.show', $product->ean_number) }}" class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
              {{ $product->title }} <hr>
              {{ $product->title_en }}
            </a>
          </p> 
          @auth
            <div class="input-group d-flex flex-nowrap mt-auto">
              <span class="input-group-text" id="addon-wrapping">{{ $product->price}} zł</span>
              <input type="number" id="item{{ $product->id }}" class="form-control" placeholder="" min="1" value="1" aria-label="Ilosc" aria-describedby="addon-wrapping">
              <span class="input-group-text" id="addon-wrapping" role="button" onClick="addToCart({{$product->id}}, 'item{{ $product->id }}', {{Auth::user()->id}}, '{{ 'message'.$product->id }}')"><i class="mdi mdi-cart-plus"></i></span>
            </div>
          @elseguest
            <p class="bg-warning">Musisz być zalogowany aby podziwiać nasze ceny</p>
          @endauth 
        </div><!-- /col-md-4 -->
      @empty
        <p class="p-2 bg-warning ">
           Nic tu nie ma
        </p>
      @endforelse
    </div><!-- /row -->

</div>

</div><!-- /main Container -->

<script>
  Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
    document.getElementById('datePicker').value = new Date().toDateInputValue();


function addToCart(productId, quantity, userId, messageBox) {
    let sessionId = '{{ session()->getId() }}';
    let qty = document.getElementById(quantity).value;
    console.log(qty);
    fetch('/api/add_to_cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // token CSRF dla Laravel
        },
        body: JSON.stringify({product_id: productId, quantity: qty, session_id: sessionId, user_id: userId})
    })
    .then(response => response.json())
    .then(data => {
        if(data.session_id && sessionId !== data.session_id) {
            sessionId = data.session_id;
            const cartSelect = document.getElementById('cart-select');

            // Stwórz nową opcję
            const newOption = document.createElement('option');
            newOption.value = sessionId;
            newOption.text = data.name; // Powinieneś tutaj użyć właściwej nazwy koszyka

            // Dodaj nową opcję do rozwijanej listy
            cartSelect.add(newOption);

            // Wybierz nowo dodaną opcję
            cartSelect.value = sessionId;
        }

        document.getElementById(messageBox).classList.remove('invisible');
        document.getElementById(messageBox).textContent = data.message; // Wartość `message` zostanie wyświetlona w elemencie o id `message`
       

        setTimeout(function() {
            document.getElementById(messageBox).classList.add("invisible");
        }, 2000); // 3000 ms (3 sekundy)
    });
}

</script>
@endsection('content')