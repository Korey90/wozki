      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar offcanvas-start sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <!-- Zamowienia -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#zamowienia" aria-expanded="false" aria-controls="zamowienia">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Zamowienia</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="zamowienia">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('orders.index') }}">Lista zamówień </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}"> Faktury </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('promotion.index') }}"> Statystyki </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('product.duplicates') }}">Statusy Zamowień</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('product.update.price') }}">Update Prices</a></li>
                </ul>
              </div>
            </li>

            <!-- Catalog -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#catalog" aria-expanded="false" aria-controls="catalog">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Produkty</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="catalog">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}"> Lista Produktów </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('supplier.index') }}"> Suppliers </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('promotion.index') }}"> Promotions </a></li>
                  <hr>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('product.duplicates') }}">Products Duplicates</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('product.update.price') }}">Update Prices</a></li>
                </ul>
              </div>
            </li>


            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('order.create') }}">Make jk Order</a></li>
                  <li class="nav-item"> <a class="nav-link" href="">Costumer Orders</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('invoice.index') }}">Faktury</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#stock" aria-expanded="false" aria-controls="stock">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Stock</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="stock">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ url('admin/stocks') }}">Inventory</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Sales</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('purchases') }}">Purchases</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Shop</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ url('admin/carousel') }}">carousel</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Sales</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">b2b</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('btb.dashboard') }}">Panel sterowania</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('btb.index') }}">Product List</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('btb.assignCategories') }}">Zaktualizuj Kategorie produktow</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Error pages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.inne') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">inne</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('welcome') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">front</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('artisan.index') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Artisan</span>
              </a>
            </li>


          </ul>
        </nav>