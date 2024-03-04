@extends('front.layout.layout')

@section('content')
<div class="container d-flex">

@include('front.layout.sidebar')


<div class="container border">
  <!-- partial -->

  <div class="row p-2 m-2 lh-lg">
  <div class="d-flex justify-content-between">
    <p class="p-2 display-5">Ustawienia Konta</p>
    <p class="fs-6">Twoje Saldo: <big>0.00 zł</big></p>
  </div>


            <h6 class="card-subtitle mb-2 text-muted">DANE KONTAKTOWE</h6>

            @if (session('status') OR $errors->first('status'))
            <div class="alert alert-info">
                {{ session('status') }}
                <div class="text-danger">{{ $errors->first('status') }}</div>

            </div>
            @endif
            <div class="row">

                <div class="col-md-6 p-2"><p class="h5">Email</p></div>
                <div class="col-md-6 p-2">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ $user->email }}" aria-describedby="button-addon2" readonly>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#changeEmail">
                      Zmien adres Email
                    </button>

                    <!-- Modal -->
                    <div class="modal fade modal-lg" id="changeEmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Zmiana adresu Email</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{ route('user.changeEmail') }}" method="post">
                          <div class="modal-body">
                              @csrf
                              @method('PUT')
                            <div class="mb-3 row">
                              <label for="email" class="col-sm-4 col-form-label">Nowy Email</label>
                              <div class="col-sm-8">
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div><!-- end of modal -->

                  </div>  
                </div>

                <div class="col-md-6 p-2"><p class="h5">Telefon</p></div>
                <div class="col-md-6 p-2">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" value=" @if(isset($user->userDetails->phone)) {{ $user->userDetails->phone }} @endif " aria-describedby="button-addon2" readonly>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#changePhone">
                      Zmien numer telefonu
                    </button>

                    <!-- Modal -->
                    <div class="modal fade modal-lg" id="changePhone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Zmiana numeru telefonu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{ route('user.changePhone') }}" method="post" name="changePhone">
                            @csrf
                            @method('PUT')
                          <div class="modal-body">
                            <div class="mb-3 row">
                              <label for="phone" class="col-sm-4 col-form-label">Nowy numer telefonu</label>
                              <div class="col-sm-8">
                                <input type="tel" name="phone" value="@if(isset($user->userDetails->phone)) {{ $user->userDetails->phone }} @endif" class="form-control" id="phone">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div><!-- end of modal -->

                  </div>
                </div>

            </div>


        <h6 class="card-subtitle mb-2 text-muted">DANE UZYTKOWNIKA</h6>
<form action="{{ route('user.changeUserDetails') }}" method="post">
  @csrf
  @method('PUT')
        <div class="row">
          <div class="col-md-6 p-2"><p class="h5">Imię</p></div>
          <div class="col-md-6 p-2"><input type="text" class="form-control" name="fname" value="@if(isset($user->userDetails->fname)) {{ $user->userDetails->fname }} @endif" id=""></div>
          <div class="col-md-6 p-2"><p class="h5">Drugie Imie (opcjonalne)</p></div>
          <div class="col-md-6 p-2"><input type="text" class="form-control" name="mname" value="@if(isset($user->userDetails->mname)) {{ $user->userDetails->mname }} @endif" id=""></div>
          <div class="col-md-6 p-2"><p class="h5">Nazwisko</p></div>
          <div class="col-md-6 p-2"><input type="text" class="form-control" name="lname" value="@if(isset($user->userDetails->lname)) {{ $user->userDetails->lname }} @endif" id=""></div>
          <div class="col-md-6 p-2"><p class="h5">Płeć</p></div>
          <div class="col-md-6 p-2">
            <select name="sex" id="" class="form-control">
              <option value="">Wybierz z listy</option>
              <option value="male" @if(isset($user->userDetails->sex) AND $user->userDetails->sex == 'male') selected @endif>Mężczyzna</option>
              <option value="female" @if(isset($user->userDetails->sex) AND $user->userDetails->sex == 'female') selected @endif>Kobieta</option>
              <option value="other" @if(isset($user->userDetails->sex) AND $user->userDetails->sex == 'other') selected @endif>Cos pomiędzy</option>
            </select>
          </div>
        </div>



    <input type="submit" value="Update" class="btn btn-outline-primary float-right">
</form>   

  </div><!-- / .row -->

</div>

</div>
   @endsection('content')