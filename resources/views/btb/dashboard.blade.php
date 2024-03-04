@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">

     <h2 class="display-3 mb-3">Zażadzanie i integracje b2b</h2>

     <div class="row">
        <div class="col-md-6">
            <h3>Pobierz Dane Marini </h3>
            <p>Zczytaj dane z pliku marini (https://marini.pl/b2b/marini-b2b.xml) i zapisz je w baze danych w tabeli 'btbs'. Tak przygotowane dane posluza do integracji tabelki z produktami. Operacja moze trwac do 3 minut. nie odświeżaj Strony!</p>
            <p>
                Obecnie tabela 'btbs' posiada <b>{{ $total_btbs }}</b> zapisanych wierszy. <br>
                Ostatnia aktualizacja 'btbs' była <b>{{ $last_update }}</b>.
            </p>
        </div>
        <div class="col-md-6">
            <a href="{{ route('btb.makeit') }}" class="btn btn-info" onClick="return confirm('Czy napewno chcesz wykonac te akcje?');">Pobierz</a>
            <a href="#" class="btn btn-danger" onClick="return confirm('Czy napewno chcesz wykonac te operacje?\nSpowoduje ona pernapentna utrate danych z tabeli btbs');">Wyczyść tabelke btbs</a>
        </div>
     </div><!-- End row -->


     <div class="row">
        <div class="col-md-6">
            <h3>Integracja Produktów</h3>
            <p>Zaktualizuj produkty z tabeli btbs z tabelka products. Ten skrypt pobierze kolumne EAN Number i porówna z tabelka btbs. Dane w tabelce products sa aktualizowane z tymi z tabeliki btbs. funkcja tworzy katalogi oraz pobiera zdjecia od marini i zapisuje je w storage/products2/</p>
            <p>
                Obecnie tabela 'products' posiada <b>{{ $total_products }}</b> zapisanych wierszy. <br>
                Ostatnia aktualizacja 'products' była <b>{{ $last_update_products }}</b>.
            </p>
            <p class="text-danger"><b>Uwaga!</b> Operacja moze zajać nawet godzine i moze zostac przerwana przez serwer marini, co skutkuje wystapieniem błędu. W takim przypadku poprostu odświeżyć strone</p>
        </div>
        <div class="col-md-6">
            <a href="{{ route('btb.integrate') }}" class="btn btn-info" onClick="return confirm('Czy napewno chcesz wykonac te akcje?');">Wykonaj Integracje</a>
        </div>
     </div><!-- End row -->

     <div class="row">
        <div class="col-md-6">
            <h3>Integracja Kategorii</h3>
            <p>Pobieramy kategorie z tabeli Category i uzupelniamy pivot category-products</p>
            <p>
                Obecnie tabela 'category' posiada <b>{{ $total_category }}</b> zapisanych wierszy. <br>
                W tym <b>{{ $total_category_brand }}</b> brands
                Ostatnia aktualizacja 'category' była <b>{{ $last_update_category }}</b>.

            </p>
        </div>
        <div class="col-md-6">
            <a href="{{ route('btb.assignCategories') }}" class="btn btn-info" onClick="return confirm('Czy napewno chcesz wykonac te akcje?');">Aktualizuj Kategorie</a>
        </div>
     </div><!-- End row -->
 

     <div class="row">
        <div class="col-md-6">
            <h3>Pobieranie danych z Baby Brands Direct</h3>
            <p>Pobieramy kategorie z tabeli Category i uzupelniamy pivot category-products</p>
            <p>
                Obecnie tabela 'category' posiada <b>{{ $total_category }}</b> zapisanych wierszy. <br>
                W tym <b>{{ $total_category_brand }}</b> brands
                Ostatnia aktualizacja 'category' była <b>{{ $last_update_category }}</b>.

            </p>
        </div>
        <div class="col-md-6">
            <a href="{{ route('btb.assignCategories') }}" class="btn btn-info" onClick="return confirm('Czy napewno chcesz wykonac te akcje?');">pobierz</a>
        </div>
     </div><!-- End row -->




     </div><!-- end content wraper -->

     

     <!-- Footer -->
     @include('admin.layout.footer')

  </div><!-- end .main-panel -->


@endsection('content')