@extends('admin.layout.layout')
@section('content')

<div class="container">
    <h2>Dodaj Promocje/rabat</h2>
    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ol class="list-group list-group-numbered">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
  @endif

    <form action="{{ route('promotion.store') }}" method="post">
        @csrf
        @method('POST')
<h3>title</h3>
<input type="text" name="title" id="">
<span>tytuł rabatu (office only)</span>

<h3>typ rabatu</h3>
<label for="typ1" style="padding: 4px; display: block;">
    <input type="radio" name="typ" value="0" id="typ1">Rabat kwotowy na produkty
</label>
<label for="typ2" style="padding: 4px; display: block;">
    <input type="radio" name="typ" value="1" id="typ2">Rabat kwotowy na zamówienie
</label>
<label for="typ3" style="padding: 4px; display: block;">
    <input type="radio" name="typ" value="2" id="typ3">Kup X, a otrzymasz Y
</label>
<label for="typ4" style="padding: 4px; display: block;">
    <input type="radio" name="typ" value="3" id="typ4">Darmowa wysyłka
</label>
<label for="typ5" style="padding: 4px; display: block;">
    <input type="radio" name="typ" value="4" id="typ5">Promocja na produkt
</label>
<span>Typ rabatu</span>

<h3>Wartosc Rabatu</h3>
<input type="text" name="value" id="">
<label for="procent" style="padding: 4px; display: block;">
    <input type="radio" name="value_option" value="procent" id="procent">%
</label>
<label for="pln" style="padding: 4px; display: block;">
    <input type="radio" name="value_option" value="pln" id="pln">pln
</label>

<h3>Dotyczy produktów</h3>


<div>
    <input type="text" id="searchInput" placeholder="Search products...">
    <div id="searchResults"></div>
  </div>
  
  <div id="selectedProducts"></div>
  


<label for="status" style="padding: 4px; display: block;">
Status
    <select name="status" id="status">
        <option value="active">Active</option>
        <option value="draw">Draw</option>
        <option value="disabled">Disabled</option>
    </select>
</label>


<h3>Wymagania</h3>
<label for="requirment" style="padding: 4px; display: block;">
    Minimalna cena zamowienia
<input type="text" name="requirment" id="requirment"> PLN
    </label>


    <h3>Valid from</h3>
    <label for="valid_from" style="padding: 4px; display: block;">
        Od
        <input type="date" name="valid_from" id="valid_from">
    </label>
    <label for="valid_to" style="padding: 4px; display: block;">
        Do
        <input type="date" name="valid_to" id="valid_to">
    </label>


    <h3>Kod kuponu</h3>
    <label for="code" style="padding: 4px; display: block;">
        Kod
        <input type="text" name="code" id="code">

    </label>
    
    <label for="submit" style="padding: 4px; display: block;">
        <input type="submit" value="Wyslij" id="submit">
    </label>
</form>
</div>


<script type="text/javascript">
$(document).ready(function() {
  $('#searchInput').on('input', function() {
    var searchTerm = $(this).val();

    if (searchTerm.trim() !== '') {
      $.ajax({
        url: '/admin/rabaty/find/',
        method: 'GET',
        data: {
          searchTerm: searchTerm
        },
        success: function(products) {
          var resultsHtml = '';
          products.forEach(function(product) {
            var checked = $('.selected-product input[value="'+product.id+'"]').length > 0 ? 'checked' : '';
            resultsHtml += '<div>';
            resultsHtml += '<input type="checkbox" class="productCheckbox" value="' + product.id + '" '+checked+'>';
            resultsHtml += '<label>' + product.title + '</label>';
            resultsHtml += '</div>';
          });
          $('#searchResults').html(resultsHtml);
        }
      });
    } else {
      $('#searchResults').html('');
    }
  });

  $(document).on('change', '.productCheckbox', function() {
    var selectedProductsHtml = '';
    $('.productCheckbox:checked').each(function() {
      var productId = $(this).val();
      var productName = $(this).siblings('label').text();
      selectedProductsHtml += '<div class="selected-product">';
      selectedProductsHtml += '<input type="hidden" name="selectedProducts[]" value="' + productId + '">';
      selectedProductsHtml += '<span>' + productName + '</span>';
      selectedProductsHtml += '<button type="button" class="removeSelectedProduct">Remove</button>';
      selectedProductsHtml += '</div>';
    });
    $('#selectedProducts').html(selectedProductsHtml);
  });

  // Populating the selected products on page load and after search term change
  function populateSelectedProducts() {
    var selectedProductsHtml = '';
    $('.productCheckbox:checked').each(function() {
      var productId = $(this).val();
      var productName = $(this).siblings('label').text();
      selectedProductsHtml += '<div class="selected-product">';
      selectedProductsHtml += '<input type="hidden" name="selectedProducts[]" value="' + productId + '">';
      selectedProductsHtml += '<span>' + productName + '</span>';
      selectedProductsHtml += '<button type="button" class="removeSelectedProduct">Remove</button>';
      selectedProductsHtml += '</div>';
    });
    $('#selectedProducts').html(selectedProductsHtml);
  }

  populateSelectedProducts();

  $(document).on('click', '.removeSelectedProduct', function() {
    $(this).parent('.selected-product').remove();
  });
});

</script>



@endsection('content')