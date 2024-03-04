@extends('front.layout.layout')

@section('content')
<div class="container d-flex">
@include('front.layout.sidebar')

<div class="container border">

  <div class="row p-2 m-2 lh-lg">
    
    <div class="d-flex justify-content-between">
      <p class="p-2 display-5">Moja Firma</p>
      <p class="fs-6">Twoje Saldo: <big>0.00 zł</big></p>
    </div>

    <div class="col-md-6 mb-1">Imie i Nazwisko wlasciciela</div>
    <div class="col-md-6 mb-1">
      <div class="input-group">
        <input type="text" data-id="{{ $company->id }}" name="fname" aria-label="Pierwszeimie" class="form-control"  value="@if(isset($company->userDetails->fname)) {{ $company->userDetails->fname }} @endif "  placeholder="Pierwsze imie" onkeyup="updateField(this)">
        <input type="text" data-id="{{ $company->id }}" name="mname" aria-label="Drógieimie" class="form-control" value="@if(isset($company->userDetails->mname)) {{ $company->userDetails->mname }} @endif" placeholder="Drógie imie" onkeyup="updateField(this)">
        <input type="text" data-id="{{ $company->id }}" name="lname" aria-label="Nazwisko" class="form-control" value="@if(isset($company->userDetails->lname)) {{ $company->userDetails->lname }} @endif" placeholder="Nazwisko" onkeyup="updateField(this)">
      </div>
      
      

    </div>

    <div class="col-md-6 mb-1">Nazwa firmy</div>
    <div class="col-md-6 mb-1">
      <input type="text" data-id="{{ $company->id }}" name="company_name" class="form-control" value="@if(isset($company->company->company_name)) {{ $company->company->company_name }} @endif" placeholder="Nazwa Firmy" onkeyup="updateField(this)">
    </div>

    <div class="col-md-6 mb-1">NIP</div>
    <div class="col-md-6 mb-1">
      <input type="text" data-id="{{ $company->id }}" name="company_nip" class="form-control" value="@if(isset($company->company->company_nip)) {{ $company->company->company_nip }} @endif" placeholder="NIP Firmy" onkeyup="updateField(this)">
    </div>

    <div class="col-md-6 mb-1">REGON</div>
    <div class="col-md-6 mb-1">
        <input type="text" data-id="{{ $company->id }}" name="company_regon" id="company_regon" class="form-control" value="@if(isset($company->company->company_regon)) {{ $company->company->company_regon }} @endif" placeholder="REGON Firmy" onkeyup="updateField(this)">
    </div>

    <div class="col-md-6 mb-1">
      Adres Firmy <br>
      <small class="text-muted">(powinien byc taki sam jaki widnieje na stronie CIDG)</small>
    </div>
    <div class="col-md-6 mb-1">
        <textarea class="form-control" data-id="{{ $company->id }}" name="company_address" placeholder="Adres firmy" rows="3" onkeyup="updateField(this)">{{ $company->company->company_address }}</textarea>
    </div>

    <div class="col-md-6 mb-1">Numer telefonu</div>
    <div class="col-md-6 mb-1">
      <input type="text" data-id="{{ $company->id }}" name="phone" class="form-control" value="@if(isset($company->company->phone)) {{ $company->company->phone }} @endif" placeholder="Numer telefonu" onkeyup="updateField(this)">
    </div>
  
    <div class="col-md-6 mb-1">Adres email</div>
    <div class="col-md-6 mb-1">
      <input type="email" data-id="{{ $company->id }}" name="email" class="form-control" value="@if(isset($company->company->email)) {{ $company->company->email }} @endif" placeholder="Adres email" onkeyup="updateField(this)">
    </div>
 


</div>
</div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">


function updateField(e){
     const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     const value = $(e).val();
     const field = $(e).attr('name');
     const id = $(e).attr('data-id');
          //          console.log(value);

     $.ajax({
          url: '{{ route('user.companyUpdate') }}',
          type: 'put',
          data: {
               _token: '{{ csrf_token() }}',
               value: value,
               field: field,
               id:id
          },

     success: function (data){
          //alert(data);
          if( data[0]==1){
               $(e).addClass('is-invalid');
          }else{
               $(e).addClass('is-valid');
          }
     },
     error: function (data){
      console.log(data);
     }
     });

}


</script>

   @endsection('content')