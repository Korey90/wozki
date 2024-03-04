@extends('front.layout.layout')

@section('content')
<div class="container d-flex">
@include('front.layout.sidebar')
<!-- Widok managera skladania zamowien -->
<div class="container border">
    <div class="row p-2 m-2 lh-lg">

    <div class="d-flex justify-content-between">
        <p class="p-2 display-5">Manager Skladania Zamowien</p>
        <p class="fs-6">Twoje Saldo: <big>0.00 zł</big></p>
      </div>
    

        <div class="col-sm-6">
            <input type="text" class="form-control" id="product-search" placeholder="Wyszukaj produkt..." autofocus onkeyup="searchProduct()">
            <div id="product-list"></div>
        </div>
        <div class="col-sm-6">
            <select id="cart-select" class="form-control mb-2" onchange="loadCart()">
                <option value="Wybierz koszyk">Wybierz koszyk</option>
                @foreach($carts->unique('name') as $cart)
                    <option value="{{ $cart->session_id }}">{{ $cart->name }}</option>                    
                @endforeach
            </select>
            <div id="message" class="alert alert-primary invisible"></div>
            <div id="cart-list"></div>
            <hr>

            <div class="border p-2 m-2 shadow" style="background-color: #a883a88c;">

                  <h3>Rodzaj zamowienia</h3>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Zamowienie Hurtowe">
                    <label class="form-check-label" for="inlineRadio1">Zamowienie Hurtowe</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Dropshipping">
                    <label class="form-check-label" for="inlineRadio2">Dropshipping</label>
                  </div>

                  <h3>Wiadomosc dla sprzedajacego</h3>
                  <textarea name="" class="form-control" id="noteToSeller" rows="4" style="width: 100%;"></textarea>

                  <h3>Data Realizacji</h3>
                  <input type="date" name="" class="form-control" id="datePicker" readonly>

                  <h3>Adres Wysyłki</h3>
                  <select name="adres_wysylki" id="adres_wysylki" class="form-control">
                    @foreach ($adresy as $adres)
                    <option value="{{ $adres->id }}" class="adres-option">
                        {{ $adres->stline }}<br>
                        {{ $adres->ndline }}<br>
                        {{ $adres->post_code }} {{ $adres->town }}<br>
                    </option>
                @endforeach
                  </select>

                  <h3>Numer Kontaktowy <small class="text-muted">firmowy</small></h3>
                  <input type="tel" name="" id="companyPhone" class="form-control" value="{{ $phone }}">


            </div>

            <button onclick="submitOrder()" class="btn btn-success">Złóż zamówienie</button>
              
        </div>
    </div>
</div>

</div>


<script>
    Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
    document.getElementById('datePicker').value = new Date().toDateInputValue();


 function searchProduct() {
        const query = document.getElementById('product-search').value;

        // Sprawdzenie warunków dla wyszukiwania
        if (query.length >= 2) {
            fetch('/api/search_product', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // token CSRF dla Laravel
                },
                body: JSON.stringify({ query: query })
            })
            .then(response => response.json())
            .then(data => {
                const productList = document.getElementById('product-list');
                productList.innerHTML = ''; // wyczyszczenie listy produktów

                const userId = '{{ Auth::user()->id }}';     

                // Tworzenie elementu tabeli
                const table = document.createElement('table');
                table.classList.add('table', 'table-sm', 'table-striped'); // Dodanie klas Bootstrapa

                // Dodanie nagłówków tabeli
                const thead = document.createElement('thead');
                const headerRow = document.createElement('tr');
                const th0 = document.createElement('th');
                th0.textContent = "Photo";
                const th1 = document.createElement('th');
                th1.textContent = "Nazwa produktu";
                const th2 = document.createElement('th');
                th2.textContent = "Cena";
                const th3 = document.createElement('th');
                th3.textContent = "Ilość";
                const th4 = document.createElement('th');
                th4.textContent = "Akcje";
                headerRow.append(th0, th1, th2, th3, th4);
                thead.appendChild(headerRow);
                table.appendChild(thead);

                // Tworzenie ciała tabeli
                const tbody = document.createElement('tbody');
                table.appendChild(tbody);

                data.forEach(product => {
                    // Tworzenie wiersza dla każdego produktu
                    const productRow = document.createElement('tr');

                    //komorka dla nazwy Photo
                    const photoNameCell = document.createElement('td');
                    if (product.product_photos && product.product_photos.length > 0) {
                        const photoUrl = product.product_photos[0].photo;
                      photoNameCell.innerHTML = '<img src="' + photoUrl + '" style="width: 120px; height: auto;">';
                    } else {
                      photoNameCell.textContent = 'Brak zdjęcia';
                    }
                    productRow.appendChild(photoNameCell);

                    // Komórka dla nazwy produktu
                    const productNameCell = document.createElement('td');
                    productNameCell.innerHTML = product.title + "<br> <br> <strong>Ean:</strong> <a href=\"product/" + product.ean_number + " \">" + product.ean_number + "</a>";
                    productNameCell.classList.add('text-wrap');
                    productRow.appendChild(productNameCell);

                    // Komórka dla nazwy produktu
                    const productPriceCell = document.createElement('td');
                    productPriceCell.textContent = product.price;
                    productRow.appendChild(productPriceCell);

                    // Komórka dla ilości produktu
                    const quantityCell = document.createElement('td');
                    const quantityInput = document.createElement('input');
                    quantityInput.type = 'number';
                    quantityInput.min = 1;
                    quantityInput.value = 1;
                    quantityInput.classList.add('form-control');
                    quantityCell.appendChild(quantityInput);
                    productRow.appendChild(quantityCell);

                    // Komórka dla przycisku
                    const buttonCell = document.createElement('td');
                    const addButton = document.createElement('button');
//                    addButton.textContent = 'Dodaj do koszyka';
                    addButton.classList.add('btn', 'btn-outline-primary', 'mdi', 'mdi-cart-plus');
                    addButton.onclick = () => addToCart(product.id, quantityInput.value, userId);
                    buttonCell.appendChild(addButton);
                    productRow.appendChild(buttonCell);

                    // Dodanie wiersza do ciała tabeli
                    tbody.appendChild(productRow);
                });

                // Dodanie tabeli do listy produktów
                productList.appendChild(table);

                
            });
        } else {
            const productList = document.getElementById('product-list');
            productList.innerHTML = ''; // wyczyszczenie listy produktów
        }
    }

 

function addToCart(productId, quantity, userId) {
    let sessionId = document.getElementById('cart-select').value;
    fetch('api/add_to_cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // token CSRF dla Laravel
        },
        body: JSON.stringify({product_id: productId, quantity: quantity, session_id: sessionId, user_id: userId})
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

        document.getElementById('message').classList.remove('invisible');
        document.getElementById('message').textContent = data.message; // Wartość `message` zostanie wyświetlona w elemencie o id `message`
        loadCart();

        setTimeout(function() {
            document.getElementById('message').classList.add("invisible");
        }, 2000); // 3000 ms (3 sekundy)
    });
}

function removeFromCart(cartId) {
    fetch('/api/remove_from_cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // token CSRF dla Laravel
        },
        body: JSON.stringify({cart_id: cartId})
    })
    .then(response => response.json())
    .then(data => {
        if (data.name !== null) {
            const cartSelect = document.getElementById('cart-select');
            const options = cartSelect.querySelectorAll('option');

            options.forEach((option) => {
              if (option.value === data.name) {
                cartSelect.removeChild(option);
              }
            });

          cartSelect.selectedIndex = 0;
        }



        document.getElementById('message').classList.remove('invisible');
        document.getElementById('message').textContent = data.message; 
        loadCart();

        setTimeout(function() {
            document.getElementById('message').classList.add("invisible");
        }, 2000); // 3000 ms (3 sekundy)
    });
}


function changeQuantity(cartId, quantity) {
    fetch('/api/change_quantity', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // token CSRF dla Laravel
        },
        body: JSON.stringify({cart_id: cartId, quantity: quantity})
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('message').classList.remove('invisible');
        document.getElementById('message').textContent = data.message; // Wartość `message` zostanie wyświetlona w elemencie o id `message`
        loadCart();

        setTimeout(function() {
            document.getElementById('message').classList.add("invisible");
        }, 2000); // 3000 ms (3 sekundy)
    });
}


function loadCart() {
    const cartId = document.getElementById('cart-select').value;
    fetch('/api/load_cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // token CSRF dla Laravel
        },
        body: JSON.stringify({session_id: cartId})
    })
    .then(response => response.json())
    .then(data => {
    // aktualizacja listy produktów w koszyku na podstawie odpowiedzi
    const cartList = document.getElementById('cart-list');
    cartList.innerHTML = ''; // wyczyszczenie listy produktów

    // Tworzenie elementu tabeli
    const table = document.createElement('table');
    table.classList.add('table', 'table-striped'); // Dodanie klas Bootstrapa

    // Dodanie nagłówków tabeli
    const thead = document.createElement('thead');
    const headerRow = document.createElement('tr');
    const th1 = document.createElement('th');
    th1.textContent = "Nazwa produktu";
    const th2 = document.createElement('th');
    th2.textContent = "Cena";
    const th3 = document.createElement('th');
    th3.textContent = "Ilość";
    const th4 = document.createElement('th');
    th4.textContent = "Razem";
    const th5 = document.createElement('th');
    th5.textContent = "Akcje";
    headerRow.append(th1, th2, th3, th4, th5);
    thead.appendChild(headerRow);
    table.appendChild(thead);

    // Tworzenie ciała tabeli
    const tbody = document.createElement('tbody');
    table.appendChild(tbody);

    data.forEach(cart => {
        // Tworzenie wiersza dla każdego produktu w koszyku
        const cartRow = document.createElement('tr');

        // Komórka dla nazwy produktu
        const productNameCell = document.createElement('td');
        productNameCell.innerHTML = cart.product.title + '<br><br><strong>Ean:</strong> ' + cart.product.ean_number;
        productNameCell.classList.add('text-wrap');
        cartRow.appendChild(productNameCell);

        // Komórka dla ceny produktu
        const priceCell = document.createElement('td');
        priceCell.textContent = cart.product.price + ' pln';
        cartRow.appendChild(priceCell);

        // Komórka dla ilości produktu
        const quantityCell = document.createElement('td');
        const quantityInput = document.createElement('input');
        quantityInput.type = 'number';
        quantityInput.min = 1;
        quantityInput.value = cart.qty;
        quantityInput.classList.add('form-control'); // Dodanie klasy Bootstrapa do inputa
        quantityInput.onchange = () => changeQuantity(cart.id, quantityInput.value);
        quantityCell.appendChild(quantityInput);
        cartRow.appendChild(quantityCell);

        // Komórka dla całkowitej wartości
        const totalCell = document.createElement('td');
        totalCell.textContent = (cart.product.price * cart.qty).toFixed(2) + ' pln';
        cartRow.appendChild(totalCell);

        // Komórka dla przycisku
        const buttonCell = document.createElement('td');
        buttonCell.classList.add('d-flex', 'flex-column');
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Usuń';
        removeButton.classList.add('btn', 'btn-danger'); // Dodanie klas Bootstrapa do przycisku
        removeButton.onclick = () => removeFromCart(cart.id);
        buttonCell.appendChild(removeButton);
        cartRow.appendChild(buttonCell);
        
        const addNote = document.createElement('button');
        addNote.classList.add('mdi', 'mdi-note-plus-outline');
        addNote.dataset.cartId = cart.id; // Przypisanie wartości cartId do atrybutu data-cart-id

        addNote.onclick = () => addItemNote(addNote.dataset.cartId, cart.note);
        buttonCell.appendChild(addNote);

        cartRow.appendChild(buttonCell);


        // Dodanie wiersza do ciała tabeli
        tbody.appendChild(cartRow);
    });

    // Dodanie tabeli do listy produktów
    cartList.appendChild(table);        
});


}
function addItemNote(cartId, note) {
  const cartRow = event.target.parentNode.parentNode;
  const hasNote = cartRow.getAttribute('data-has-note');

  if (hasNote === null) {


    const textarea = document.createElement('textarea');
    if(note !== null){
        textarea.value = note;
        }
    textarea.classList.add('form-control');
    textarea.style.border = '2px solid green';

    const noteCell = document.createElement('td');
    noteCell.colSpan = 5;
    noteCell.appendChild(textarea);

    const noteRow = document.createElement('tr');
    noteRow.appendChild(noteCell);

    cartRow.insertAdjacentElement('afterend', noteRow);
    cartRow.setAttribute('data-has-note', 'true');

    // Obsługa zapisu notatki w bazie danych
    textarea.addEventListener('blur', () => {
      const note = textarea.value;
      //const cartId = cartRow.getAttribute('data-cart-id');


      fetch('/api/save_note', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}' // token CSRF dla Laravel
        },
        body: JSON.stringify({ cartId, note })
      })
      .then(response => {
        // Obsługa odpowiedzi serwera po zapisie notatki
        if (response.ok) {
          console.log('Notatka została zapisana w bazie danych.');
        } else {
          console.log('Wystąpił błąd podczas zapisywania notatki.');
        }
      })
      .catch(error => {
        console.log('Wystąpił błąd podczas zapisywania notatki:', error);
      });
    });
  }
}





function submitOrder() {
    const cartId = document.getElementById('cart-select').value;
    // Pobierz referencję do wszystkich elementów radio
    const radioButtons = document.getElementsByName('inlineRadioOptions');
    const noteToSeller = document.getElementById('noteToSeller').value;

    // Pobierz referencję do elementu <select> za pomocą getElementById
    const selectElement = document.getElementById('adres_wysylki');

    // Pobierz wartość zaznaczonej opcji
    const deliveryAddress = selectElement.value;

    const companyPhone = document.getElementById('companyPhone').value;

    console.log(companyPhone);

    const orderDate = document.getElementById('datePicker').value;



    // Przeiteruj przez elementy radio i sprawdź, który został zaznaczony
    let orderType;
    for (const radioButton of radioButtons) {
      if (radioButton.checked) {
        orderType = radioButton.value;
        break;
      }
    }

    
    fetch('/api/submit_order', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // token CSRF dla Laravel
        },
        body: JSON.stringify({session_id: cartId, type: orderType, order_date: orderDate, buyer_notes: noteToSeller, delivery_address: deliveryAddress})
    })
    .then(response => response.json())
    .then(data => {
        //console.log(data);
        if(data.success){
            alert(data.message);
            // Przeładuj stronę
            location.reload();

        }
        // aktualizacja interfejsu użytkownika na podstawie odpowiedzi
    });
    
}
</script>

@endsection

  

