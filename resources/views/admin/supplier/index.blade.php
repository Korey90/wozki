@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Supplier List</h3>
                  <h6 class="font-weight-normal mb-0">All my suppliers</h6>
                </div>
              </div>
            </div>
          </div>

{{-- $supplier --}}

     {{-- $supplier->title --}}
     {{-- $supplier->fname --}}
     {{-- $supplier->mname --}}
     {{-- $supplier->lname --}}
     {{-- $supplier->language --}}
     {{-- Address --}}

{{-- $supplier->supplierAddress->stline --}}
{{-- $supplier->supplierAddress->ndline --}}
{{-- $supplier->supplierAddress->town --}}
{{-- $supplier->supplierAddress->post_code --}}
       {{-- Contact --}}

       {{-- $supplier->supplierContact->phone --}}
       {{-- $supplier->supplierContact->email --}}
       {{-- $supplier->supplierContact->fax --}}
       {{-- $supplier->supplierContact->facebook --}}
       {{-- $supplier->supplierContact->telegram --}}
       {{-- $supplier->supplierContact->whatsapp --}}
       {{-- $supplier->supplierContact->website --}}

       {{-- Company --}}
       {{-- $supplier->supplierCompany->name --}}
       {{-- $supplier->supplierCompany->vat_id --}}
       {{-- $supplier->supplierCompany->eori_id --}}
       {{-- $supplier->supplierCompany->logo --}}
       {{-- $supplier->supplierCompany->description --}}




<div class="row row-cols-md-4">
     @forelse ($suppliers as $supplier)
          <div class="col mb-2">
               <div class="card">
                    <img src="{{ $supplier->supplierCompany->logo }}" class="card-img-top" alt="{{ $supplier->title }}">
                    <div class="card-body">
                         <h5 class="card-title">{{ $supplier->title }}</h5>
                         <hr>
                         <p>
                              {{ $supplier->fname }}
                              {{ $supplier->mname }}
                              {{ $supplier->lname }}
                         </p>

                         <p>{{ $supplier->lname }}</p>
                         <hr>
                         <p>
                              {{ $supplier->supplierAddress->stline }} <br>
                              {{ $supplier->supplierAddress->ndline }} <br>
                              {{ strtoupper($supplier->supplierAddress->town) }} <br>
                              {{ strtoupper($supplier->supplierAddress->post_code) }}
                         </p>
                         <hr>

                         <ul class="list-arrow">
                              <li>
                                   <a href="#">
                                        <i class="mdi mdi-email mr-2"></i>{{ $supplier->supplierContact->email }}
                                   </a>
                              </li>
                              <li>
                                   <a href="#">
                                        <i class="mdi mdi-cellphone-android mr-2"></i>{{ $supplier->supplierContact->phone }}
                                   </a>
                              </li>
                         </ul>
                         <a href="{{ route('supplier.show', $supplier->id) }}" class="">more..</a>
                         <br>
                         <a href="{{ route('supplier.edit', $supplier->id) }}">Edit</a>

                    </div>
               </div>

          </div>     
     @empty
          nic tu nie ma
     @endforelse

     <div class="col mb-2 text-center">
          <a href="{{ route('supplier.create') }}" class="text-decoration-none">
               <div class="card">
                    <div class="card-body">
                         <h1 class="card-title">Add New Supplier</h1>
                         <i class="mdi mdi-plus-circle text-success" style="font-size: 18rem"></i>
                    </div>
               </div>
          </a>
     </div>     

</div><!-- End row -->






     </div><!-- end content wraper -->

     

     <!-- Footer -->
     @include('admin.layout.footer')



  </div><!-- end .main-panel -->
@endsection('content')