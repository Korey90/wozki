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
                    @foreach ($carousel as $slide)
                           <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true" aria-label="Slide {{ $slide->id }}"></button>
                       @endforeach

                     </div>
                     <div class="carousel-inner">
                       @foreach ($carousel as $slide)

                         <div class="carousel-item @if ($loop->first) active @endif">
                           <img src="{{ asset('storage/'.$slide->image) }}" class="d-block w-100" style="max-height: 520px;" alt="asset('storage/'.$slide->image)">
                           <div class="carousel-caption d-none d-md-block">
                             <h4 class="text-uppercase font-weight-bolder">{{ $slide->title }}</h4>
                             <p>{{ $slide->description }}</p>
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


    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    @if (session('status'))
      <div class="alert alert-info">
          <ul>

                  <li>{{ session('status') }}</li>

          </ul>
      </div>
    @endif

            <table class="table table-striped table-responsive">
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
                        <td class=""><p class="text-wrap">{{ $slide->title }}</p></td>
                        <td class="" style="max-width: 350px;">
                          <img src="{{ asset('storage/'.$slide->image) }}" alt="" class="rounded mx-auto w-100 h-auto">
                        </td>
                        <td class="text-wrap"><p class="">{{ $slide->description }}</p></td>
                        <td class=""><a href="product/{{ $slide->product_ean }}">{{ $slide->product_ean }}</a></td>
                        <td class="">{{ substr($slide->created_at, 0, -9) }}</td>
                        <td class="">{{ substr($slide->updated_at, 0, -9) }}</td>
                        <td class="">
                          <a href="{{ route('carousel.edit', [$slide->id]) }}" class="btn btn-md btn-primary">Edit</a>
                          <form method="POST" action="">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="delete" value="{{ $slide->id }}">
                            <button class="btn btn-md btn-danger">Delete</button>
                          </form>
                        </td>
                    </tr>
                    @endforeach

                    <tr style="border-top: solid 2px grey;">
                      <form enctype="multipart/form-data" method="POST" action=" {{ route('carousel.store') }}">
                        @csrf
                        @method('POST')
                        <td>Add new</td>
                        <td>
                          <input class="form-control form-control-sm" type="text" name="title" id="" value="{{ old('title') }}" placeholder="Title">
                        </td>
                        <td>
                          <input type="file" name="image" class="form-control" id="image" value="">
                          <br>
                          <img id="preview-image-before-upload" src=""
                          alt="preview image" style="" class="rounded mx-auto w-100 h-auto">
                        </td>
                        <td><textarea class="form-control form-control-sm" name="description" id="" cols="40" rows="2" placeholder="Description">{{ old('description') }}</textarea></td>
                        <td>
                          <select class="form-select" name="product_ean" id="">
                            <option value=""  selected>Chose a Product</option>
                            @foreach ($products as $product)
                              <option value="{{ $product->ean_number }}">{{ $product->title}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td colspan="3"><input class="btn btn-success form-control" type="submit" value="Save"></td>
                      </form>
                    </tr>
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



  <script type="text/javascript">
      
    $(document).ready(function (e) {
     
       
       $('#image').change(function(){
                
        let reader = new FileReader();
     
        reader.onload = (e) => { 
     
          $('#preview-image-before-upload').attr('src', e.target.result); 
        }
     
        reader.readAsDataURL(this.files[0]); 
       
       });
       
    });
     
    </script>

@endsection('content')