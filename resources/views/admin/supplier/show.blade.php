@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12">
                  <h3 class="font-weight-bold">Supplier #{{ $supplier->first()->id }} - {{ $supplier->first()->title }} </h3>
                  <h6 class="font-weight-normal mb-0">Supplier details</h6>
                </div>
              </div>
            </div>
          </div>


          <div class="row row-cols-md-2">

                    <div class="col-md mb-2">
                         <div class="card">
                              <img src="" class="card-img-top" alt="">
                              <div class="card-body">
                                   <h5 class="card-title d-flex align-items-center"><i class="mdi mdi-account-box icon-md"></i> Personal Details</h5>
                                   <hr>
                                   <p>First Name <u class="float-right">{{ ($supplier->first()->fname) ? $supplier->first()->fname : 'n/a' }}</u></p>
                                   <p>Middle Name <u class="float-right">{{ ($supplier->first()->mname) ? $supplier->first()->mname : 'n/a' }}</u></p>
                                   <p>Last Name <u class="float-right">{{ ($supplier->first()->lname) ? $supplier->first()->lname : 'n/a' }}</u></p>
                                   <p>Language <u class="float-right">{{ ($supplier->first()->language) ? $supplier->first()->language : 'n/a' }}</u></p>

                        <hr>


          
                              </div>
                         </div>
          
                    </div><!-- end .col    -->     




                    <div class="col-md mb-2">
                         <div class="card">
                              <img src="" class="card-img-top" alt="">
                              <div class="card-body">
                                   <h5 class="card-title d-flex align-items-center"> <i class="mdi mdi-home icon-md"></i> Addres Details</h5>
                                   <hr>
                                   <p>First Line <u class="float-right">{{ ($supplier->first()->supplierAddress->stline) ? $supplier->first()->supplierAddress->stline : 'n/a' }}</u></p>
                                   <p>Secound Line <u class="float-right">{{ ($supplier->first()->supplierAddress->ndline) ? $supplier->first()->supplierAddress->ndline : 'n/a' }}</u></p>
                                   <p>Town/City <u class="float-right">{{ ($supplier->first()->supplierAddress->town) ? $supplier->first()->supplierAddress->town : 'n/a' }}</u></p>
                                   <p>Post Code <u class="float-right">{{ ($supplier->first()->supplierAddress->post_code) ? $supplier->first()->supplierAddress->post_code : 'n/a' }}</u></p>

                        
                                   <hr>

          
                              </div>
                         </div>
          
                    </div><!-- end .col    -->     






                    <div class="col mb-2">
                         <div class="card">
                              <img src="" class="card-img-top" alt="">
                              <div class="card-body">
                                   <h5 class="card-title d-flex align-items-center"><i class="mdi mdi-human-greeting icon-md"></i> Contact Details</h5>
                                   <hr>
          
                                   <ul class="list-arrow">
                                        <li>
                                             <a href="#">
                                                  <!-- Email -->
                                                  <i class="mdi mdi-email mr-2"></i>{{ ($supplier->first()->supplierContact->email) ? $supplier->first()->supplierContact->email : 'n/a' }}
                                             </a>
                                        </li>
                                        <li>
                                             <a href="#">
                                                  <!-- Phone -->
                                                  <i class="mdi mdi-cellphone-android mr-2"></i>{{ ($supplier->first()->supplierContact->phone) ? $supplier->first()->supplierContact->phone : 'n/a' }}
                                             </a>
                                        </li>
                                        <li>
                                             <a href="#">
                                                  <!-- Fax -->
                                                  <i class="mdi mdi-fax  mr-2"></i>{{ ($supplier->first()->supplierContact->fax) ? $supplier->first()->supplierContact->fax : 'n/a' }}
                                             </a>
                                        </li>
                                        <li>
                                             <a href="#">
                                                  <!-- WWW -->
                                                  <i class="mdi mdi-web  mr-2"></i>{{ ($supplier->first()->supplierContact->website) ? $supplier->first()->supplierContact->website : 'n/a' }}
                                             </a>
                                        </li>
                                        <hr>
                                        <li>
                                             <a href="#">
                                                  <!-- Facebook -->
                                                  <i class="mdi mdi-facebook-messenger  mr-2"></i>{{ ($supplier->first()->supplierContact->facebook) ? $supplier->first()->supplierContact->facebook : 'n/a' }}
                                             </a>
                                        </li>
                                        <li>
                                             <a href="#">
                                                  <!-- Telegram -->
                                                  <i class="mdi mdi-telegram  mr-2"></i>{{ ($supplier->first()->supplierContact->telegram) ? $supplier->first()->supplierContact->telegram : 'n/a' }}
                                             </a>
                                        </li>
                                        <li>
                                             <a href="#">
                                                  <!-- Whatsapp -->
                                                  <i class="mdi mdi-whatsapp  mr-2"></i>{{ ($supplier->first()->supplierContact->whatsapp) ? $supplier->first()->supplierContact->whatsapp : 'n/a' }}
                                             </a>
                                        </li>

                                   </ul>

          
                              </div>
                         </div>
          
                    </div><!-- end .col    -->     


                    <div class="col mb-2">
                         <div class="card">
                              <img src="" class="card-img-top" alt="">
                              <div class="card-body">
                                   <h5 class="card-title d-flex align-items-center"> <i class="mdi mdi-factory icon-md"></i> Company Details</h5>
                                   <hr>
                                   <p>Company Name <u class="float-right">{{ ($supplier->first()->supplierCompany->name) ? $supplier->first()->supplierCompany->name : 'n/a' }}</u></p>
                                   <p>VAT ID <u class="float-right">{{ ($supplier->first()->supplierCompany->vat_id) ? $supplier->first()->supplierCompany->vat_id : 'n/a' }}</u></p>
                                   <p>EORI ID <u class="float-right">{{ ($supplier->first()->supplierCompany->eori_id) ? $supplier->first()->supplierCompany->eori_id : 'n/a' }}</u></p>
                                   <hr>
                                   <p><img class="w-100" src="{{ ($supplier->first()->supplierCompany->logo) ? $supplier->first()->supplierCompany->logo : 'n/a' }}" alt="image"></p>
                                   <hr>
                                   <p>{{ ($supplier->first()->supplierCompany->description) ? $supplier->first()->supplierCompany->description : 'n/a' }}</p>

                        
                                   <hr>

          
                              </div>
                         </div>
          
                    </div><!-- end .col    -->     

          

          
          </div><!-- End row -->
          

















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





     </div><!-- end content wraper -->

     

     <!-- Footer -->
     @include('admin.layout.footer')



  </div><!-- end .main-panel -->
@endsection('content')