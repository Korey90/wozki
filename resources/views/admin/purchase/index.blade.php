@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
     <div class="content-wrapper">
         <div class="container">
            <h2>Purchases List:</h2>
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
    @if (session('status'))
      <div class="alert alert-info">
          <ul>
                <li>{{ session('status') }}</li>
          </ul>
      </div>
    @endif







      <table class="table table-dark my-4">
        <thead>
            <th class="p-3">ID</th>
            <th class="p-3">PURCHASE NUMBER</th>
            <th class="p-3">EAN NUMBER</th>
            <th class="p-3">UNIT PRICE</th>
            <th class="p-3">QTY</th>
            <th class="p-3">VAT</th>
            <th class="p-3">TOTAL</th>
            <th class="p-3">STATUS</th>
            <th class="p-3">CREATED AT</th>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td class="p-3 align-top">{{ $purchase->id }}</td>
                    <td class="p-3 align-top">{{ $purchase->purchase_number }}
                    </td>
                    <td class="p-3 align-top">
                        @foreach ($purchase->ean_number as $num)
                           <li class="mb-1 list-group-item list-group-item-dark"><a href="{{ route('product.show', $num) }}" class="text-decoration-none">{{ $num }}</a></li>
                        @endforeach
                    </td>
                    <td class="p-3 align-top">
                        @foreach ($purchase->unit_price as $price)
                            <li class="mb-1 list-group-item list-group-item-dark">£ {{ $price }}</li>
                        @endforeach
                    
                    </td>
                    <td class="p-3 align-top">
                        @foreach ($purchase->qty as $qty)
                            <li class="mb-1 list-group-item list-group-item-dark">{{ $qty }}</li>
                        @endforeach
                    </td>
                    <td class="p-3 align-top">
                        <li class="list-group-item list-group-item-dark">{{ $purchase->vat }}%</li>
                    </td>
                    <td class="p-3 align-top">
                        @foreach ($purchase->ean_number as $num)
                            <li class="mb-1 list-group-item list-group-item-dark">
                                £ {{ number_format(($purchase->qty[$loop->index] * $purchase->unit_price[$loop->index]), 2) }}
                            </li>
                        @endforeach
                        <hr />
                        <li class="mb-1 list-group-item list-group-item-info">£ {{ $purchase->total }}</li>
                        <li class="mb-1 list-group-item list-group-item-info">{{ $purchase->vat }}% vat.  £ {{ number_format($purchase->total*($purchase->vat/100), 2) }}</li>
                        <li class="mb-1 list-group-item list-group-item-info">TOTAL inc.vat{{ number_format($purchase->total*($purchase->vat/100) + $purchase->total, 2) }}</li>

                    </td>
                    <td class="p-3 align-top"><span class="p-3 badge rounded-pill badge-secondary">{{ $purchase->status }}</span></td>
                    <td class="p-3 align-top">
                        <div class="d-flex flex-column" >
                            <p>{{ $purchase->created_at }}</p>
                        <!-- Default dropup button -->
<div class="btn-group dropdown">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Actions
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">View</a></li>
        <li><a class="dropdown-item" href="#">Edit</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Cancel</a></li>
    
      <!-- Dropdown menu links -->
    </ul>
  </div>
</div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>












      
        </div><!-- end of .container -->

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