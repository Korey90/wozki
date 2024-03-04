@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
 

          <div class="row">
               <div class="col-12">
                 <div class="table-responsive">
                   <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                         <div class="col-sm-12 col-md-6">
                              <h2>Product List</h2>
                              <h5>Mamy tu {{ $items->count() }} produktow</h5>
                         </div>
                         <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">


                         <div class="col-sm-12">

                              
                         {{ $items->links() }}
      
                              <table class="expandable-table no-footer" style="width:100%; overflow: scroll; border-collapse: collapse;">
                                   <thead style="position: sticky; top: 190;">
                                       <tr>
                                           <th class="sorting">@sortablelink('id')</th>
                                           <th class="sorting">@sortablelink('kod')</th>
                                           <th class="sorting">@sortablelink('nazwa')</th>
                                           <th class="sorting">@sortablelink('cena')</th>
                                           <th class="sorting">@sortablelink('VAT')</th>
                                           <th class="sorting">@sortablelink('stan')</th>
                                           <th class="sorting">@sortablelink('EAN')</th>
                                           <th class="sorting">@sortablelink('grupa')</th>
                                           <th class="sorting">@sortablelink('opis')</th>
                                           <th class="sorting">@sortablelink('zdjecia')</th>


                                       </tr>
                                   </thead>

                               <tbody>
                                @foreach ($items as $item)

                                    <tr>
                                        <td class="border">{{ $item->id }}</td>
                                        <td class="border">{{ $item->kod }}</td>
                                        <td class="border">{{ $item->nazwa }}</td>
                                        <td class="border">{{ $item->cena }}</td>
                                        <td class="border">{{ $item->VAT }}</td>
                                        <td class="border">{{ $item->stan }}</td>
                                        <td class="border">{{ $item->EAN }}</td>
                                        <td class="border">{{ $item->grupa }}</td>
                                        <td class="border">{{ $item->opis }}</td>
                                        <td class="border">
                                             @forelse (explode(' ', $item->zdjecia) as $foto)
                                                  <img src="{{ $foto }}" alt="" class="w-50">
                                             @empty
                                                  brak zdjecia
                                             @endforelse
                                        </td>
                                    </tr>
                                    
                                @endforeach
                               </tbody>

                              </table>

                              {{ $items->links() }}
                              
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