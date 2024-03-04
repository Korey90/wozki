@extends('front.layout.layout')

@section('content')
<div class="container d-flex">
@include('front.layout.sidebar')

<div class="container border">
  <form action="{{ route('user.changeUserName') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

      <div class="row p-2 m-2 lh-lg">

      <div class="d-flex justify-content-between">
        <p class="p-2 display-5">Twoj Profil {{ Auth::user()->name }}</p>
        <p class="fs-6">Twoje Saldo: <big>0.00 zł</big></p>
      </div>

      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
      @endif




          <div class="col-6"><p class="fs-5">Nazwa uzytkownika</p></div>
          <div class="col-6">
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="">
          </div>

          <div class="col-6"><p class="fs-5">Data zalozenia konta</p></div>
          <div class="col-6">{{ $user->created_at }}</div>

          <div class="col-12 text-right">
            <input type="submit" value="Aktualizuj Profil" class="btn btn-outline-primary">
          </div>
          
          
        </div><!-- /row -->
        
      </form>
      



</div>
</div>
@endsection('content')