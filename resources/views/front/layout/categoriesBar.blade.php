      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">

        <ul class="nav">
          <li class="nav-item">
              <h3 class="menu-title ml-2">Kategorie</h3>
          </li>

          @foreach(\App\Models\Admin\Category::all() as $category)
            @if($category->brand == null)
            {{ $category->name }}, 

            @endif
          @endforeach

          <li class="nav-item">
              <h3 class="menu-title ml-2">Nasze Marki</h3>
          </li>
          @foreach(\App\Models\Admin\Category::all() as $category)
            @if($category->brand == 1)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontShow', $category->name) }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">{{ $category->name }}</span>
              </a>
            </li>
            @endif
          @endforeach
          
        </ul>
      </nav>