@extends('admin.layout.layout')
@section('content')




<div class="main-panel">
    <div class="content-wrapper">
     <div class="row">
          <div class="col-sm-12 col-md-6">
               <h5>Categories List</h5>
          </div>
          <div class="col-sm-12 col-md-6"><a href="{{ url()->previous() }}"><i class="mdi mdi-keyboard-backspace icon-md float-right"></i></a></div>
     </div><!-- ./row -->


     @if (session('status'))
     <div class="alert alert-success">
         {{ session('status') }}
     </div>
     @endif

     <form action="{{ route('category.create') }}" method="post">
      @csrf
      @method('POST')
          <div class="d-flex flex-fill my-2">
              <input type="text" name="name" class="form-control" id="name" value="" placeholder="Create New Category">
              <input type="submit" class="btn btn-outline-success" value="Create Category">
            </div>
          </form>
         <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                   <div class="row">
                    Jest {{ $categories->count() }} Kategorii
                        <div class="col-sm-12 d-flex flex-wrap">
      
                        @foreach ($categories as $category)
                            <div class="border p-2 w-25">
                                <h5 class="text-wrap">
                                    {{ $category->id }} -
                                    {{ $category->name }} <br>
                                    @if($category->logo)
                                    <img src="{{ url($category->logo) }}" alt="">
                                    @endif
                                    {{ $category->products->count() }}
                                </h5>


                                <div class="d-flex">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#category{{ $category->id }}">
  Edit
</button>

<form action="{{ route('category.delete') }}" method="post" class="flex-fill">
  @csrf
  @method('DELETE')
  <input type="hidden" name="id" value="{{ $category->id }}">
  <input type="submit" class="btn btn-danger" value="Delete">
</form>
                                </div>
                                
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="category{{ $category->id }}" tabindex="-1" aria-labelledby="category{{ $category->id }}" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="categoryLabel{{ $category->id }}">Category Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="{{ route('category.update') }}" method="post" id="{{ $category->id }}">
                                  <div class="modal-body">
                                      @csrf
                                      @method('PUT')
                                      <p>Category name:</p>
                                      <input type="hidden" name="id" value="{{ $category->id }}">
                                      <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="">
                                      
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <input type="submit" class="btn btn-primary" value="Save changes">
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                        @endforeach

                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-sm-12 col-md-5"></div>
                        <div class="col-sm-12 col-md-7"></div>
                   </div>
              </div>
                </div>
              </div>
            </div>



    </div><!-- end content wraper -->

    

    <!-- Footer -->
    @include('admin.layout.footer')

 </div><!-- end .main-panel -->


@endsection('content')