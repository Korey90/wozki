@extends('admin.layout.layout')
@section('content')

<div class="container">
<h2>Promotions here</h2>

@foreach ($promotions as $promotion)
   <b>TITLE:</b> {{ $promotion->title }} <br>
   <b>TYP:</b> {{ $promotion->typ }} <br>
   <b>PROMOTION VALUE:</b> {{ $promotion->value }} <br>
   <b>PRODUCTS:</b> {{ $promotion->products }} <br>
   <b>STATUS:</b> {{ $promotion->status }} <br>
   <b>WYMAGANIA:</b> {{ $promotion->requirements }} <br>
   <b>OKRES WAZNOSCI:</b> {{ $promotion->valid_from }} - {{ $promotion->valid_to }}<br>
   <b>KOD:</b> {{ $promotion->code }} 
    <hr>
@endforeach

<a href="{{ route('promotion.create') }}">

    <button type="submit"  class="btn btn-primary">add new</button>
</a>

</div>

@endsection('content')