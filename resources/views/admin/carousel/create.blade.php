@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
     <div class="content-wrapper">
         <div class="container">
            <h2>Carousel Managment</h2>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, neque. Quod explicabo odit dolorum, natus voluptas assumenda? Esse aliquid, nobis, fuga quisquam dolor veritatis asperiores quidem voluptate assumenda, nihil ipsa.

            <div class="p-3 border mb-4">
                <h3>Preview:</h3>

                      <!-- carusel -->
      <div id="carouselExampleCaptions" class="carousel carousel-fade slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>

        </div>
        <div class="carousel-inner">
          @foreach ($carousel as $slide)
            <div class="carousel-item @if ($slide->id == 1) active @endif">
              <img src="{{ $slide->image }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h4 class="text-uppercase font-weight-bolder">{{ $slide->title }}</h4>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
          @endforeach
  
       
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- /end carusel -->

            </div>

            <button class="btn btn-success">Add New Slide</button>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                  <tr class="">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th class="text-wrap">Linked to Product</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                    @foreach ($carousel as $slide)
                    <tr class="" style="word-wrap: break-word;">                        
                        <td class="">{{ $slide->id }}</td>
                        <td class="" class="w-25"><p class="text-wrap">{{ $slide->title }}</p></td>
                        <td class=""><img src="{{ $slide->image }}" alt="{{ $slide->title }}"></td>
                        <td class=" text-wrap"><p class="">{{ $slide->description }}</p></td>
                        <td class="">{{ $slide->product_id }}</td>
                        <td class="">{{ substr($slide->created_at, 0, -9) }}</td>
                        <td class="">{{ substr($slide->updated_at, 0, -9) }}</td>
                        <td class="">
                          <button class="btn btn-md btn-primary">Edit</button>
                          <button class="btn btn-md btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>

     </div><!-- end content wraper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
{{-- <scriptsrc="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     <!-- Footer -->
     @include('admin.layout.footer')

  </div><!-- end .main-panel -->


@endsection('content')