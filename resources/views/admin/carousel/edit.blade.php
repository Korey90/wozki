@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
     <div class="content-wrapper">
         <div class="container">
            <h2>Edit Slide</h2>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, neque. Quod explicabo odit dolorum, natus voluptas assumenda? Esse aliquid, nobis, fuga quisquam dolor veritatis asperiores quidem voluptate assumenda, nihil ipsa.



    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
<form action="{{ route('carousel.update', $carousel->first()->id) }}" enctype="multipart/form-data" method="POST" class="my-3">
  @method('PUT')
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Slide Title</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ $carousel->first()->title }}">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Slide Description</label>
    <textarea type="text" class="form-control" name="description" id="description" rows="4">{{ $carousel->first()->description }}</textarea>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Slide Image / Background</label>
    <input type="file" class="form-control" name="image" id="image">
    <img src="{{ asset('storage/'.$carousel->first()->image) }}" alt="image" class="rounded img-thumbnail m-2 w-50 h-auto" id="preview-image-before-upload">
  </div>
  <div class="mb-3">
    <label for="created_at" class="form-label">Created at</label>
    <input type="text" class="form-control" name="created_at" id="created_at" value="{{ $carousel->first()->created_at }}" readonly>
  </div>
  <div class="mb-3">
    <label for="updated_at" class="form-label">Updated at</label>
    <input type="text" class="form-control" name="updated_at" id="updated_at" value="{{ $carousel->first()->updated_at }}" readonly>
  </div>
  <div class="mb-3">
    <label for="product_ean" class="form-label">Slide Assigned to product</label>

    <select name="product_ean" id="product_ean" class="form-select">
      @foreach ($products as $ean => $title)
        <option value="{{ $ean }}" @if ($carousel->first()->product_ean == $ean ) selected @endif >{{ $title }}</option>
      @endforeach
    </select>
  </div>
  <hr>
  <div class="mb-3">
    <label for="updated_at" class="form-label"></label>
    <input type="submit" class="btn btn-primary float-right" name="updated_at" id="updated_at" value="Update Slide" >
  </div>

</form>
            
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