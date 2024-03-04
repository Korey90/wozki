@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12">
                  <h3 class="font-weight-bold">Edit Supplier Details </h3>
                  <h6 class="font-weight-normal mb-0">#{{ $supplier->first()->id }} - {{ $supplier->first()->title }}</h6>
                </div>
              </div>
            </div>
          </div>

          <div class="row row-cols-md-3">

               <div class="col-md mb-2">
                    <div class="card h-100">
                         <img src="" class="card-img-top" alt="">
                         <div class="card-body">
                              <h5 class="card-title d-flex align-items-center"><i class="mdi mdi-account-box icon-md"></i> General Details</h5>
                              <hr>
                              <p class="form-group">Id <u class="float-right w-50"><input type="text" value="{{ $supplier->first()->id }}" class="form-control form-control-sm" readonly></u></p>
                              <p class="form-group">Title <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" class="form-control form-control-sm" name="title" id="title" value="{{ $supplier->first()->title }}" onkeyup="saveMe(this)"></u></p>

                         </div>
                    </div>
               </div><!-- end .col    -->  



                    <div class="col-md mb-2">
                         <div class="card">
                              <img src="" class="card-img-top" alt="">
                              <div class="card-body">
                                   <h5 class="card-title d-flex align-items-center"><i class="mdi mdi-account-box icon-md"></i> Personal Details</h5>
                                   <hr>
                                   <p class="form-group">First Name <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="fname" id="fname" class="form-control form-control-sm" value="{{ $supplier->first()->fname }}" onkeyup="saveMe(this)"></u></p>
                                   <p class="form-group">Middle Name <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="mname" id="mname" class="form-control form-control-sm" value="{{ $supplier->first()->mname }}" onkeyup="saveMe(this)"></u></p>
                                   <p class="form-group">Last Name <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="lname" id="lname" class="form-control form-control-sm" value="{{ $supplier->first()->lname }}" onkeyup="saveMe(this)"></u></p>
                                   <p class="form-group">Language <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="language" id="language" class="form-control form-control-sm" value="{{ $supplier->first()->language }}" onkeyup="saveMe(this)"></u></p>

           
          
                              </div>
                         </div>
          
                    </div><!-- end .col    -->     

                    <div class="col-md mb-2">
                         <div class="card">
                              <img src="" class="card-img-top" alt="">
                              <div class="card-body">
                                   <h5 class="card-title d-flex align-items-center"> <i class="mdi mdi-home icon-md"></i> Addres Details</h5>
                                   <hr>
                                   <p class="form-group">First Line <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="stline" id="stline" class="form-control form-control-sm" value="{{ $supplier->first()->supplierAddress->stline }}" onkeyup="saveMe(this)"></u></p>
                                   <p class="form-group">Secound Line <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="ndline" id="ndline" class="form-control form-control-sm" value="{{ $supplier->first()->supplierAddress->ndline }}" onkeyup="saveMe(this)"></u></p>
                                   <p class="form-group">Town/City <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="town" id="town" class="form-control form-control-sm" value="{{ $supplier->first()->supplierAddress->town }}" onkeyup="saveMe(this)"></u></p>
                                   <p class="form-group">Post Code <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="post_code" id="post_code" class="form-control form-control-sm" value="{{ $supplier->first()->supplierAddress->post_code }}" onkeyup="saveMe(this)"></u></p>
                         
                              </div>
                         </div>
          
                    </div><!-- end .col    -->     



                    <div class="col mb-2">
                         <div class="card">
                              <img src="" class="card-img-top" alt="">
                              <div class="card-body">
                                   <h5 class="card-title d-flex align-items-center"> <i class="mdi mdi-factory icon-md"></i> Company Details</h5>
                                   <hr>

                                   <p class="form-group">Company Name <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="name" id="name" class="form-control form-control-sm" value="{{ $supplier->first()->supplierCompany->name }}" onkeyup="saveMe(this)"></u></p>
                                   <p class="form-group">VAT ID <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="vat_id" id="vat_id" class="form-control form-control-sm" value="{{ $supplier->first()->supplierCompany->vat_id }}" onkeyup="saveMe(this)"></u></p>
                                   <p class="form-group">EORI ID <u class="float-right w-50"><input data-id="{{ $supplier->first()->id }}" type="text" name="eori_id" id="eori_id" class="form-control form-control-sm" value="{{ $supplier->first()->supplierCompany->eori_id }}" onkeyup="saveMe(this)"></u></p>

                                   <h5 class="my-3">Company Logo</h5>
                                   <img class="w-100" src="{{ ($supplier->first()->supplierCompany->logo) ? $supplier->first()->supplierCompany->logo : 'n/a' }}" alt="image">

                                   <h5 class="my-3">Company Description</h5>
                                   <textarea data-id="{{ $supplier->first()->id }}" name="description" id="description" cols="30" rows="8" class="w-100 form-control" onkeyup="saveMe(this)">{{ $supplier->first()->supplierCompany->description }}</textarea>


                    

          
                              </div>
                         </div>
          
                    </div><!-- end .col    -->     



                    <div class="col mb-2">
                         <div class="card">
                              <img src="" class="card-img-top" alt="">
                              <div class="card-body">
                                   <h5 class="card-title d-flex align-items-center"><i class="mdi mdi-human-greeting icon-md"></i> Contact Details</h5>
                                   <hr>
                                                  <!-- Email -->
                                        <p class="form-group">Email <u class="float-right w-75"><input data-id="{{ $supplier->first()->id }}" type="text" name="email" id="email" class="form-control form-control-sm" value="{{ $supplier->first()->supplierContact->email }}" onkeyup="saveMe(this)"></u></p>

                                                  <!-- Phone -->
                                        <p class="form-group">Phone <u class="float-right w-75"><input data-id="{{ $supplier->first()->id }}" type="text" name="phone" id="phone" class="form-control form-control-sm" value="{{ $supplier->first()->supplierContact->phone }}" onkeyup="saveMe(this)"></u></p>

                                                  <!-- Fax -->
                                        <p class="form-group">Fax <u class="float-right w-75"><input data-id="{{ $supplier->first()->id }}" type="text" name="fax" id="fax" class="form-control form-control-sm" value="{{ $supplier->first()->supplierContact->fax }}" onkeyup="saveMe(this)"></u></p>

                                                  <!-- WWW -->
                                        <p class="form-group">Website <u class="float-right w-75"><input data-id="{{ $supplier->first()->id }}" type="text" name="website" id="website" class="form-control form-control-sm" value="{{ $supplier->first()->supplierContact->website }}" onkeyup="saveMe(this)"></u></p>

                                        <h5 class="my-3">Social Media</h5>

                                                  <!-- Facebook -->
                                        <p class="form-group">Facebook <u class="float-right w-75"><input data-id="{{ $supplier->first()->id }}" type="text" name="facebook" id="facebook" class="form-control form-control-sm" value="{{ $supplier->first()->supplierContact->facebook }}" onkeyup="saveMe(this)"></u></p>

                                                  <!-- Telegram -->
                                        <p class="form-group">Telegram <u class="float-right w-75"><input data-id="{{ $supplier->first()->id }}" type="text" name="telegram" id="telegram" class="form-control form-control-sm" value="{{ $supplier->first()->supplierContact->telegram }}" onkeyup="saveMe(this)"></u></p>

                                                  <!-- Whatsapp -->
                                        <p class="form-group">Whatsapp <u class="float-right w-75"><input data-id="{{ $supplier->first()->id }}" type="text" name="whatsapp" id="whatsapp" class="form-control form-control-sm" value="{{ $supplier->first()->supplierContact->whatsapp }}" onkeyup="saveMe(this)"></u></p>
           
                              </div>
                         </div>
          
                    </div><!-- end .col    -->     




          

          
          </div><!-- End row -->


     </div><!-- end content wraper -->






     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script type="text/javascript">
     
          $(function() {
               // Multiple images preview with JavaScript
               var previewImages = function(input, imgPreviewPlaceholder) {
                    if (input.files) {
                         var filesAmount = input.files.length;
                         for (i = 0; i < filesAmount; i++) {
                              var reader = new FileReader();
                              reader.onload = function(event) {
                                   $($.parseHTML('<img>')).attr('src', event.target.result).attr('width', '150px').attr('height', 'auto').addClass('m-2').appendTo(imgPreviewPlaceholder);
                              }
                              reader.readAsDataURL(input.files[i]);
                         }
     
                    }
               };
               $('#productImages').on('change', function() {
                    previewImages(this, 'div.images-preview-div');
                    $('.images-preview-div').empty();
               });
     
           
          });
     
     
     function saveMe(e){
          const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          const value = $(e).val();
          const field = $(e).attr('name');
          const id = $(e).attr('data-id');
               //          console.log(value);
     
          $.ajax({
               url: '{{ route('supplier.update') }}',
               type: 'put',
               data: {
                    _token: '{{ csrf_token() }}',
                    value: value,
                    field: field,
                    id:id
               },
     
          success: function (data){
               console.log(data);
               if( data[0]==1){
                    $(e).addClass('is-invalid');
               }else{
                    $(e).addClass('is-valid');
               }
          },
          error: function (data){
          }
          });
     
     }
     
     
     </script>





     <!-- Footer -->
     @include('admin.layout.footer')



  </div><!-- end .main-panel -->
@endsection('content')