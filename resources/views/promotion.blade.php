@extends('front.layout.layout')

@section('content')
<div class="container d-flex">
@include('front.layout.menuBar')

<div class="container border">

  <div class="row p-2 m-2 lh-lg">
    
    <div class="d-flex justify-content-between">
      <p class="p-2 display-5">Promocje</p>
    </div>


    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga error quo blanditiis eaque maiores deleniti, ad porro soluta, asperiores laboriosam ut placeat eligendi suscipit consequatur? Officia consequuntur dolore itaque sunt?</p>

    @auth
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi porro aspernatur rem fugit natus molestiae maxime dolorem maiores ea cum velit magni id sequi sed minus, assumenda cupiditate suscipit iusto!</p>
    @endauth


</div>
</div>

</div><!-- /main Container -->



@endsection('content')