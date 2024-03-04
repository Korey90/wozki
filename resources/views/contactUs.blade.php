@extends('front.layout.layout')

@section('content')
<div class="container d-flex">
@include('front.layout.menuBar')

<div class="container border">

  <div class="row p-2 m-2 lh-lg">
    
    <div class="d-flex justify-content-between">
      <p class="p-2 display-5">Masz pytanie?</p>
    </div>

    <form>
            <div class="form-group">
                <label for="inputName">Imię i nazwisko</label>
                <input type="text" class="form-control" id="inputName" placeholder="Wprowadź imię i nazwisko">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Wprowadź email">
            </div>
            <div class="form-group">
                <label for="inputPhone">Telefon</label>
                <input type="tel" class="form-control" id="inputPhone" placeholder="Wprowadź numer telefonu">
            </div>
            <div class="form-group">
                <label for="inputMessage">Treść wiadomości</label>
                <textarea class="form-control" id="inputMessage" rows="3" placeholder="Wprowadź treść wiadomości"></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="acceptTerms">
                <label class="form-check-label mb-3" for="acceptTerms">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, pariatur deserunt, odit, tenetur consectetur tempore aperiam esse quos a sit soluta doloremque ipsa repellendus magnam atque non nostrum vel tempora!
                    <a href="">Akceptuję regulamin</a>
                </label>
            </div>
            <button type="submit" class="btn btn-primary float-right">Wyślij wiadomość</button>
    </form>

</div>
</div>

</div><!-- /main Container -->



@endsection('content')