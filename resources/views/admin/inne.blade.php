@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
       <div class="row">
         <div class="col-md-12 grid-margin">
           <div class="row">
             <div class="col-12 col-xl-8 mb-4 mb-xl-0">
               <h3 class="font-weight-bold">Welcome Aamir</h3>
               <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
             </div>

             <div class="col-12 col-xl-4">
              <div class="justify-content-end d-flex">
               <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                 <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                 </button>
                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                   <a class="dropdown-item" href="#">January - March</a>
                   <a class="dropdown-item" href="#">March - June</a>
                   <a class="dropdown-item" href="#">June - August</a>
                   <a class="dropdown-item" href="#">August - November</a>
                 </div>
               </div>
              </div>
             </div>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
           <div class="card">
             <div class="card-body">

             @if(session('status'))
    <div id="alert-message" class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
               <div class="d-flex justify-content-between">
                 <p class="card-title">Transakcje</p>
                 <p>
                        <button class="btn btn-secoundary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                          | | | |
                        </button>
                      </p>

               </div>
               <div class="row">


                    <div class="collapse  @if($errors->any()) show @endif" id="collapseExample">
                      <div class="card card-body" style="background-color: #e6feff;">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3>Dodaj Nowa Transakcje</h3>
                        <form action="{{ route('admin.inne.addNewTransaction') }}" method="post">
                          @method('POST')
                          @csrf

                            <div class="row">

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="typ" name="typ" value="{{ old('typ') }}" placeholder="Rodzaj Transakcji" required>
                                  <label for="typ">Rodzaj Transakcji</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="value" name="value" value="{{ old('value') }}" placeholder="Wartość Transakcji" required>
                                  <label for="value">Wartość Transakcji</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="operator" name="operator" value="{{ old('operator') }}" placeholder="Operator" required>
                                  <label for="operator">Operator</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="datetime-local" class="form-control" id="date" name="date" value="{{ old('date') }}" placeholder="Data Realizacji" required>
                                  <label for="date">Data Realizacji</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Tytuł Transakcji" required>
                                  <label for="title">Tytuł Transakcji</label>
                                </div>
                              </div>

                            </div>

                            <div class="text-right">
                              <input type="submit" class="btn btn-outline-secondary px-3 mt-2" value="Wyślij">
                            </div>
                        </form>
                      </div>
                    </div>
               </div>
               <div class="row">
                 <div class="col-12">
                   <div class="table-responsive">
                     <table id="" class="table expandable-table" style="width:100%">
                       <thead>
                            <tr>
                              <td>#</td>
                                    <td>
                                      <div class="form-floating">
                                        <input type="text" class="form-control ixa" id="typ-input" name="typ" value="{{ old('typ') }}" placeholder="Rodzaj Transakcji">
                                        <label for="floatingInput">Rodzaj Transakcji</label>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="form-floating">
                                        <input type="text" class="form-control ixa" id="value-input" name="value" value="{{ old('value') }}" placeholder="Wartość Transakcji">
                                        <label for="floatingInput">Wartość Transakcji</label>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="form-floating">
                                        <input type="text" class="form-control ixa" id="balance-input" name="balance" value="{{ old('balance') }}" placeholder="Saldo">
                                        <label for="floatingInput">Saldo</label>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="form-floating">
                                        <input type="text" class="form-control ixa" id="operator-input" name="operator" value="{{ old('operator') }}" placeholder="Operator">
                                        <label for="floatingInput">Operator</label>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="form-floating">
                                        <input type="date" class="form-control ixa" id="date-input" name="date" value="{{ old('date') }}" placeholder="Data Realizacji">
                                        <label for="floatingInput">Data Realizacji</label>
                                      </div>
                                    </td>
                                    <td>
                                      <div class="form-floating">
                                        <input type="text" class="form-control ixa" id="title-input" name="title" value="{{ old('title') }}" placeholder="Tytuł Transakcji">
                                        <label for="floatingInput">Tytuł Transakcji</label>
                                      </div>
                                    </td>  
      

                        </tr>

                       </thead>
                       <tbody>
                           @foreach($transactions as $transaction)
                                <tr>
                                  <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->typ }}</td>
                                    <td><span class=" @if($transaction->value < 0) text-danger @else text-success fw-bold @endif "> {{ $transaction->value }} </span></td>
                                    <td>{{ $transaction->balance }}</td>
                                    <td>{{ $transaction->operator }}</td>
                                    <td>{{ $transaction->date }}</td>
                                    <td>{{ $transaction->title }}</td>
                                </tr>
                           @endforeach
                       </tbody>
                   </table>
                   </div>
                 </div>
               </div>
               </div>
             </div>
           </div>
         </div>
     </div>

     <!-- Footer -->
     @include('admin.layout.footer')

     <!-- content-wrapper ends -->
     <!-- partial -->
  </div>

  <script>
// Wybierz pola input, które będą uruchamiały zapytanie AJAX
var inputs = document.querySelectorAll('input.ixa');

inputs.forEach(function(input) {
    input.addEventListener('input', function() {
        // Pobierz wartości z pól input
        var typ = document.getElementById('typ-input').value;
        var value = document.getElementById('value-input').value;
        var balance = document.getElementById('balance-input').value;
        var operator = document.getElementById('operator-input').value;
        var date = document.getElementById('date-input').value;
        var title = document.getElementById('title-input').value;

        // Utwórz obiekt do wysłania
        var data = {
            typ: typ,
            value: value,
            balance: balance,
            operator: operator,
            date: date,
            title: title
        };

        // Utwórz parametry URL na podstawie obiektu danych
        var urlParams = new URLSearchParams(Object.entries(data));

        // Wykonaj zapytanie AJAX
        fetch('/maitenace/inne/filter?' + urlParams, {
            method: 'GET',
        })
        .then(response => response.json())
        .then(data => {
            var tbody = document.querySelector('tbody');
            tbody.innerHTML = '';  // Usuń obecne wiersze

            // Dodaj nowe wiersze na podstawie odpowiedzi
            data.forEach(function(transaction) {
                var tr = document.createElement('tr');

                tr.innerHTML = `
                    <td>${transaction.id}</td>
                    <td>${transaction.typ}</td>
                    <td><span class="${transaction.value < 0 ? 'text-danger' : 'text-success fw-bold'}">${transaction.value}</span></td>
                    <td>${transaction.balance}</td>
                    <td>${transaction.operator}</td>
                    <td>${transaction.date}</td>
                    <td>${transaction.title}</td>
                `;

                tbody.appendChild(tr);
            });
        });
    });
});



//suuwanie alertu

    // Pobierz element z alertem
    const alertMessage = document.getElementById('alert-message');

    // Funkcja, która usunie alert po 2 sekundach
    const removeAlertAfterTimeout = () => {
        setTimeout(() => {
            alertMessage.remove();
        }, 2000); // 2000 ms = 2 sekundy
    };

    // Wywołaj funkcję, gdy strona zostanie załadowana
    document.addEventListener('DOMContentLoaded', removeAlertAfterTimeout);



</script>




@endsection('content')