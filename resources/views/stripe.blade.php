@extends('front.layout.layout')

@section('content')

<div>
  <h2 class="p-2">Stripe Settings</h2>
  <div class="card w-100">
    <div class="card-body">
      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif

    @if(isset($wiad))
      {{ $wiad }}
    @else
    <form action="{{ route('stripe.checkout') }}" method="post">
      @csrf
      
      <button type="submit" class="btn btn-primary">Zaplac</button> 10PLN Złotych Pało przez stripe
      </form>
    @endif

    </div><!-- /card-body -->
  </div><!-- /card -->

</div>

@endsection('content')