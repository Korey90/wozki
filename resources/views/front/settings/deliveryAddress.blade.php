@extends('front.layout.layout')

@section('content')
<div class="container d-flex">

@include('front.layout.sidebar')

<div class="container overflow-hidden border">
 
      <div class="row p-2 m-2 lh-lg">
          <div class="d-flex justify-content-between">
            <p class="p-2 display-5">Adresy dostaw</p>
            <p class="fs-6">Twoje Saldo: <big>0.00 zł</big></p>
          </div>

          @if (session('status') OR $errors->first('status'))
              <div class="alert alert-info">
                  {{ session('status') }}
                  <div class="text-danger">{{ $errors->first('status') }}</div>
              </div>
          @endif

          <!-- Modal nowy address -->
          <div class="modal fade modal-lg" id="addNewAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Dodaj Nowy Adres</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                    <form action="{{ route('user.addNewAddress') }}" method="post" name="addNewAddress">
                      @csrf
                      @method('POST')

                     <div class="row">
                      <div class="col-md-6 p-2"><p class="h5">Odbiorca imie i nazwisko</p></div>
                      <div class="col-md-6 p-2"><input type="text" class="form-control" name="recivier" id="" required></div>
                       <div class="col-md-6 p-2"><p class="h5">Panstwo</p></div>
                       <div class="col-md-6 p-2">
                         <select name="country" class="form-control" required>
                           <option value="" selected>Wybierz Panstwo</option>
                           <option value="Albania">Albania</option>
                           <option value="Andora">Andora</option>
                           <option value="Austria">Austria</option>
                           <option value="Białoruś">Białoruś</option>
                           <option value="Belgia">Belgia</option>
                           <option value="Bułgaria">Bułgaria</option>
                           <option value="Chorwacja">Chorwacja</option>
                           <option value="Cyprus">Cyprus</option>
                           <option value="Czechy">Czechy</option>
                           <option value="Dania">Dania</option>
                           <option value="Estonia">Estonia</option>
                           <option value="Finlandia">Finlandia</option>
                           <option value="francja">Francja</option>
                           <option value="Grecja">Grecja</option>
                           <option value="Hiszpania">Hiszpania</option>
                           <option value="Holandia">Holandia</option>
                           <option value="Irlandia">Irlandia</option>
                           <option value="Islandia">Islandia</option>
                           <option value="Liechtenstein">Liechtenstein</option>
                           <option value="Litwa">Litwa</option>
                           <option value="Luksemburg">Luksemburg</option>
                           <option value="Łotwa">Łotwa</option>
                           <option value="Malta">Malta</option>
                           <option value="Mołdawia">Mołdawia</option>
                           <option value="Monako">Monako</option>
                           <option value="Niemcy">Niemcy</option>
                           <option value="Norwegia">Norwegia</option>
                           <option value="Polska">Polska</option>
                           <option value="Portugalia">Portugalia</option>
                           <option value="Rosja">Rosja</option>
                           <option value="Rumunia">Rumunia</option>
                           <option value="San Marino">San Marino</option>
                           <option value="Serbia">Serbia</option>
                           <option value="Słowacja">Słowacja</option>
                           <option value="Słowenia">Słowenia</option>
                           <option value="Szwajcaria">Szwajcaria</option>
                           <option value="Szwecja">Szwecja</option>
                           <option value="Turcja">Turcja</option>
                           <option value="Ukraina">Ukraine</option>
                           <option value="Węgry">Węgry</option>
                           <option value="Wielka Brytania">Wielka Brytania</option>
                           <option value="Watykan">Watykan</option>
                         </select>
                       </div>
                       <div class="col-md-6 p-2"><p class="h5">Ulica </p></div>
                       <div class="col-md-6 p-2"><input type="text" class="form-control" name="stline"  id="" required></div>
                       <div class="col-md-6 p-2"><p class="h5">Dróga linia adresu (opcjonalne)</p></div>
                       <div class="col-md-6 p-2"><input type="text" class="form-control" name="ndline"  id=""></div>
                       <div class="col-md-6 p-2"><p class="h5">Miasto</p></div>
                       <div class="col-md-6 p-2"><input type="text" class="form-control" name="town" id="" required></div>
                       <div class="col-md-6 p-2"><p class="h5">Kod Pocztowy</p></div>
                       <div class="col-md-6 p-2"><input type="text" class="form-control" name="post_code"  id="" required></div>
                       <hr>
                       <div class="col-md-6 p-2"><p class="h5">Phone</p></div>
                       <div class="col-md-6 p-2"><input type="text" class="form-control" name="phone" value="{{ old('email') }}" id=""></div>
                       <div class="col-md-6 p-2"><p class="h5">Email</p></div>
                       <div class="col-md-6 p-2"><input type="mail" class="form-control" name="email"  id=""></div>
                       </div>
               
                    
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                     <input type="submit" value="Zapisz" class="btn btn-outline-primary float-right">
                    </form>
                   </div>
                 </div>
               </div>
          </div> <!-- end of modal -->





          <div class="row g-2">
                  @forelse ($addresses as $address)
                    <div class="border col-md-4 shadow p-2">
                        <form action="{{ route('user.deleteAddress') }}" method="post" id="{{ $address->id }}">
                             @csrf
                             @method('DELETE')
                             <input type="hidden" name="id" value="{{ $address->id }}">
                             <i class="mdi mdi-delete-forever text-danger float-right fs-4" role="button" onClick="submitForm({{ $address->id }})"></i>

                             <!-- Button trigger update Modal -->
                             <i class="mdi mdi-pencil-box-outline float-right fs-4 col-md-4" role="button" data-bs-toggle="modal" data-bs-target="#updateAddress{{ $address->id }}"></i>
                         </form>
                         {{ $address->stline }} <br>
                         @if($address->ndline == null) --- @else {{ $address->ndline }} @endif <br>
                         {{ $address->town }} , {{ $address->post_code }} <br>
                         {{ $address->country }}

                             <!-- Modal updateAddress -->
                            <div class="modal fade modal-lg" id="updateAddress{{ $address->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edytujesz adres: {{ $address->stline }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                   <form action="{{ route('user.updateAddress', ['id' => $address->id]) }}" method="post" name="updateAddress{{ $address->id }}">
                                     @csrf
                                     @method('PUT')
                                     <input type="hidden" name="address_id" value="{{ $address->id }}">

                                    <div class="row">
                                     <div class="col-md-6 p-2"><p class="h5">Odbiorca imie i nazwisko</p></div>
                                     <div class="col-md-6 p-2"><input type="text" class="form-control" name="recivier"  value="{{ $address->recivier }}" id="" required></div>
                                      <div class="col-md-6 p-2"><p class="h5">Panstwo</p></div>
                                      <div class="col-md-6 p-2">
                                        <select name="country" class="form-control" required>
                                          <option value="" selected>Wybierz Panstwo</option>
                                          <option @if($address->country == 'Albania') selected @endif value="Albania">Albania</option>
                                          <option @if($address->country == 'Andora') selected @endif value="Andora">Andora</option>
                                          <option @if($address->country == 'Austria') selected @endif value="Austria">Austria</option>
                                          <option @if($address->country == 'Białoruś') selected @endif value="Białoruś">Białoruś</option>
                                          <option @if($address->country == 'Belgia') selected @endif value="Belgia">Belgia</option>
                                          <option @if($address->country == 'Bułgaria') selected @endif value="Bułgaria">Bułgaria</option>
                                          <option @if($address->country == 'Chorwacja') selected @endif value="Chorwacja">Chorwacja</option>
                                          <option @if($address->country == 'Cyprus') selected @endif value="Cyprus">Cyprus</option>
                                          <option @if($address->country == 'Czechy') selected @endif value="Czechy">Czechy</option>
                                          <option @if($address->country == 'Dania') selected @endif value="Dania">Dania</option>
                                          <option @if($address->country == 'Estonia') selected @endif value="Estonia">Estonia</option>
                                          <option @if($address->country == 'Finlandia') selected @endif value="Finlandia">Finlandia</option>
                                          <option @if($address->country == 'francja') selected @endif value="francja">Francja</option>
                                          <option @if($address->country == 'Grecja') selected @endif value="Grecja">Grecja</option>
                                          <option @if($address->country == 'Hiszpania') selected @endif value="Hiszpania">Hiszpania</option>
                                          <option @if($address->country == 'Holandia') selected @endif value="Holandia">Holandia</option>
                                          <option @if($address->country == 'Irlandia') selected @endif value="Irlandia">Irlandia</option>
                                          <option @if($address->country == 'Islandia') selected @endif value="Islandia">Islandia</option>
                                          <option @if($address->country == 'Liechtenstein') selected @endif value="Liechtenstein">Liechtenstein</option>
                                          <option @if($address->country == 'Litwa') selected @endif value="Litwa">Litwa</option>
                                          <option @if($address->country == 'Luksemburg') selected @endif value="Luksemburg">Luksemburg</option>
                                          <option @if($address->country == 'Łotwa') selected @endif value="Łotwa">Łotwa</option>
                                          <option @if($address->country == 'Malta') selected @endif value="Malta">Malta</option>
                                          <option @if($address->country == 'Mołdawia') selected @endif value="Mołdawia">Mołdawia</option>
                                          <option @if($address->country == 'Monako') selected @endif value="Monako">Monako</option>
                                          <option @if($address->country == 'Niemcy') selected @endif value="Niemcy">Niemcy</option>
                                          <option @if($address->country == 'Norwegia') selected @endif value="Norwegia">Norwegia</option>
                                          <option @if($address->country == 'Polska') selected @endif value="Polska">Polska</option>
                                          <option @if($address->country == 'Portugalia') selected @endif value="Portugalia">Portugalia</option>
                                          <option @if($address->country == 'Rosja') selected @endif value="Rosja">Rosja</option>
                                          <option @if($address->country == 'Rumunia') selected @endif value="Rumunia">Rumunia</option>
                                          <option @if($address->country == 'San Marino') selected @endif value="San Marino">San Marino</option>
                                          <option @if($address->country == 'Serbia') selected @endif value="Serbia">Serbia</option>
                                          <option @if($address->country == 'Słowacja') selected @endif value="Słowacja">Słowacja</option>
                                          <option @if($address->country == 'Słowenia') selected @endif value="Słowenia">Słowenia</option>
                                          <option @if($address->country == 'Szwajcaria') selected @endif value="Szwajcaria">Szwajcaria</option>
                                          <option @if($address->country == 'Szwecja') selected @endif value="Szwecja">Szwecja</option>
                                          <option @if($address->country == 'Turcja') selected @endif value="Turcja">Turcja</option>
                                          <option @if($address->country == 'Ukraina') selected @endif value="Ukraina">Ukraine</option>
                                          <option @if($address->country == 'Węgry') selected @endif value="Węgry">Węgry</option>
                                          <option @if($address->country == 'Wielka Brytania') selected @endif value="Wielka Brytania">Wielka Brytania</option>
                                          <option @if($address->country == 'Watykan') selected @endif value="Watykan">Watykan</option>
                                        </select>
                                      </div>
                                      <div class="col-md-6 p-2"><p class="h5">Ulica </p></div>
                                      <div class="col-md-6 p-2"><input type="text" class="form-control" name="stline" value="{{ $address->stline }}" id="" required></div>
                                      <div class="col-md-6 p-2"><p class="h5">Dróga linia adresu (opcjonalne)</p></div>
                                      <div class="col-md-6 p-2"><input type="text" class="form-control" name="ndline" value="{{ $address->ndline }}" id=""></div>
                                      <div class="col-md-6 p-2"><p class="h5">Miasto</p></div>
                                      <div class="col-md-6 p-2"><input type="text" class="form-control" name="town" value="{{ $address->town }}" id="" required></div>
                                      <div class="col-md-6 p-2"><p class="h5">Kod Pocztowy</p></div>
                                      <div class="col-md-6 p-2"><input type="text" class="form-control" name="post_code" value="{{ $address->post_code }}" id="" required></div>
                                      <hr>
                                      <div class="col-md-6 p-2"><p class="h5">Phone</p></div>
                                      <div class="col-md-6 p-2"><input type="text" class="form-control" name="phone" value="{{ $address->phone }}" id="" ></div>
                                      <div class="col-md-6 p-2"><p class="h5">Email</p></div>
                                      <div class="col-md-6 p-2"><input type="mail" class="form-control" name="email" value="{{ $address->email }}" id="" ></div>
                                      </div>


                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                                    <input type="submit" value="Zapisz" class="btn btn-outline-primary float-right">
                                   </form>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- end of modal updateAddress -->
                    </div>
                  @empty
                    brak wpisow
                  @endforelse

                          <!-- Button trigger modal -->
                  <button type="button" class="m-2 btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addNewAddress">
                    <i class="mdi mdi-plus-circle-outline fs-3"></i>
                  </button>

              </div>

          </div><!-- /row g3 -->
     
      </div><!-- /row p2 -->

</div>

<script>
  function submitForm(id) {
    // Pobierz formularz
    var form = document.getElementById(id);
    
    // Wyślij formularz
    form.submit();
  }
  </script>

@endsection('content')