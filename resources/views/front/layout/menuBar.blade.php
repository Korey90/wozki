<div class="offcanvas offcanvas-start" id="sidebar" style="width: 280px;" data-bs-scroll="true">
<div class="flex-shrink-0 p-3 bg-white" >
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-5 fw-semibold">HOME</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1 pl-0">
        <a href="{{ route('frontShow', 'DLA MAMY') }}" class="btn btn-toggle text-left collapsed border rounded w-100" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Dla mamy
        </a>
        <div class="collapse show pl-4" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li>
              <a href="{{ route('frontShow', 'CIAZA I POROD') }}" class="align-items-center collapsed link-dark nav-link rounded" data-bs-toggle="collapse" data-bs-target="#asd" aria-expanded="false">
                <span class="menu-title">Ciąża i poród</span>
                <i class="ti-angle-down"></i>
              </a>
              <div class="collapse pl-2" id="asd">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="{{ route('frontShow', 'MAJTKI POPORODOWE') }}" class="link-dark rounded nav-link">MAJTKI POPORODOWE</a></li>
                  <li><a href="{{ route('frontShow', 'BIELIZNA I PASY') }}" class="link-dark rounded nav-link">BIELIZNA I PASY</a></li>
                </ul>
              </div>
            </li>
            <li>
              <a href="#" class="align-items-center collapsed link-dark nav-link rounded" data-bs-toggle="collapse" data-bs-target="#karmienie" aria-expanded="false">
                <span class="menu-title">Karmienie</span>
                <i class="ti-angle-down"></i>
              </a>
              <div class="collapse pl-2" id="karmienie">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="{{ route('frontShow', 'PODUSZKI DO KARMIENIA') }}" class="link-dark rounded nav-link">PODUSZKI DO KARMIENIA</a></li>
                  <li><a href="{{ route('frontShow', 'LAKTATORY') }}" class="link-dark rounded nav-link">LAKTATORY</a></li>
                  <li><a href="{{ route('frontShow', 'WKŁADKI LAKTACYJNE') }}" class="link-dark rounded nav-link">WKŁADKI LAKTACYJNE</a></li>
                </ul>
              </div>
            </li>
            <li>
              <a href="#" class="align-items-center collapsed link-dark rounded nav-link" data-bs-toggle="collapse" data-bs-target="#pielegnacja" aria-expanded="false">
                <span class="menu-title">Pielęgnacja</span>
                <i class="ti-angle-down"></i>
              </a>
              <div class="collapse pl-2" id="pielegnacja">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="{{ route('frontShow', 'KOSMETYKI') }}" class="link-dark rounded nav-link">KOSMETYKI</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </li><!-- /dla mamy -->
      <li class="mb-1">
        <button class="btn btn-toggle text-left border rounded collapsed w-100" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Pościel i tekstylia
        </button>
        <div class="collapse pl-4" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('frontShow', 'PRZEŚCIERADŁA') }}" class="link-dark rounded nav-link">Prześcieradła</a></li>
            <li><a href="{{ route('frontShow', 'PIELUSZKI') }}" class="link-dark rounded nav-link">Pieluszki</a></li>
            <li>
              <a href="#" class="align-items-center collapsed link-dark rounded nav-link" data-bs-toggle="collapse" data-bs-target="#posciele" aria-expanded="false">
                <span class="menu-title">Pościele</span>
                <i class="ti-angle-down"></i>
              </a></i>
              <div class="collapse pl-2" id="posciele">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark rounded nav-link">DO ŁÓŻECZEK</a></li>
                  <li><a href="#" class="link-dark rounded nav-link">DO ŁÓŻECZEK DOSTAWYNYCH</a></li>
                </ul>
              </div>
            </li>  
            <li><a href="{{ route('frontShow', 'KOCYKI') }}" class="link-dark rounded nav-link">Kocyki</a></li>
            <li><a href="{{ route('frontShow', 'ŚPIWORKI') }}" class="link-dark rounded nav-link">Śpiworki</a></li>
            <li><a href="{{ route('frontShow', 'ROŻKI') }}" class="link-dark rounded nav-link">Rożki</a></li>
            <li><a href="{{ route('frontShow', 'OKRYCIA KĄPIELOWE') }}" class="link-dark rounded nav-link">Okrycia kąpielowe</a></li>
            <li><a href="{{ route('frontShow', 'OCHRANIACZE') }}" class="link-dark rounded nav-link">Ochraniacze</a></li>
            <li><a href="{{ route('frontShow', 'MATERACE') }}" class="link-dark rounded nav-link">Materace</a></li>
          </ul>
        </div>
      </li><!-- /posciel i tekstylja -->
      <li class="mb-1">
        <button class="btn btn-toggle text-left border rounded collapsed w-100" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Wózki i akcesoria
        </button>
        <div class="collapse pl-4" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li>
            <a href="#" class="align-items-center collapsed link-dark rounded nav-link" data-bs-toggle="collapse" data-bs-target="#wozki" aria-expanded="false">
                <span class="menu-title">Wózki</span>
                <i class="ti-angle-down"></i>
              </a>
              <div class="collapse pl-2" id="wozki">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="{{ route('frontShow', 'ATOMIC') }}" class="link-dark rounded nav-link">ATOMIC</a></li>
                  <li><a href="{{ route('frontShow', 'FLEXY') }}" class="link-dark rounded nav-link">FLEXY</a></li>
                  <li><a href="{{ route('frontShow', 'LE CAPRICE') }}" class="link-dark rounded nav-link">LE CAPRICE</a></li>
                  <li><a href="{{ route('frontShow', 'MOODY') }}" class="link-dark rounded nav-link">MOODY</a></li>
                  <li><a href="{{ route('frontShow', 'QUICK') }}" class="link-dark rounded nav-link">QUICK</a></li>
                  <li><a href="{{ route('frontShow', 'RAPID') }}" class="link-dark rounded nav-link">RAPID</a></li>
                  <li><a href="{{ route('frontShow', 'SMART') }}" class="link-dark rounded nav-link">SMART</a></li>
                  <li><a href="{{ route('frontShow', 'STINGER') }}" class="link-dark rounded nav-link">STINGER</a></li>
                  <li><a href="{{ route('frontShow', 'TWINS') }}" class="link-dark rounded nav-link">TWINS</a></li>
                  <li><a href="{{ route('frontShow', 'TWIZZY') }}" class="link-dark rounded nav-link">TWIZZY</a></li>
                </ul>
              </div>
            </li> 
            <li>
            <a href="#" class="align-items-center collapsed link-dark rounded nav-link" data-bs-toggle="collapse" data-bs-target="#wozkiDodatki" aria-expanded="false">
                <span class="menu-title">Akcesoria samochodowe</span>
                <i class="ti-angle-down"></i>
              </a>
              <div class="collapse pl-2" id="wozkiDodatki">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 nav-link">
                  <li><a href="{{ route('frontShow', 'OSŁONKI NA PASY') }}" class="link-dark rounded nav-link">OSŁONKI NA PASY</a></li>
                  <li><a href="{{ route('frontShow', 'OCHRANIACZE I ORGANIZERY') }}" class="link-dark rounded nav-link">OCHRANIACZE I ORGANIZERY</a></li>
                  <li><a href="{{ route('frontShow', 'ROLETKI') }}" class="link-dark rounded nav-link">ROLETKI</a></li>
                  <li><a href="{{ route('frontShow', 'ZASŁONKI') }}" class="link-dark rounded nav-link">ZASŁONKI</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </li><!-- /wózki i akcesorja -->
      <li class="border-top my-3"><!-- divider --></li>
      <li class="mb-1">
        <button class="btn btn-toggle text-left border rounded collapsed w-100" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Meble i wyposażenie
        </button>
        <div class="collapse pl-4" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('frontShow', 'ŁÓŻECZKA I KOJCE') }}" class="link-dark rounded nav-link">Łóżeczka i kojce</a></li>
            <li>
             <a href="#" class="align-items-center collapsed link-dark rounded nav-link" data-bs-toggle="collapse" data-bs-target="#maty" aria-expanded="false">
                 <span class="menu-title">Przewijaki i maty</span>
                <i class="ti-angle-down"></i>
               </a>
               <div class="collapse pl-2" id="maty">
                 <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                   <li><a href="{{ route('frontShow', 'MATY DO PRZEWIJANIA') }}" class="link-dark rounded nav-link">MATY DO PRZEWIJANIA</a></li>
                   <li><a href="{{ route('frontShow', 'PRZEWIJAKI MIĘKKIE I TWARDE') }}" class="link-dark rounded nav-link">PRZEWIJAKI MIĘKKIE I TWARDE</a></li>
                 </ul>
               </div>
            </li>
            <li><a href="{{ route('frontShow', 'FOTELIKI I SOFY') }}" class="link-dark rounded nav-link">Foteliki i sofy</a></li>
            <li><a href="{{ route('frontShow', 'KOMODY') }}" class="link-dark rounded nav-link">Komody</a></li>
            <li><a href="{{ route('frontShow', 'ŁÓŻECZKA') }}" class="link-dark rounded nav-link">Łóżeczka</a></li>
            <li><a href="{{ route('frontShow', 'SZAFY') }}" class="link-dark rounded nav-link">Szafy</a></li>
          </ul>
        </div>
      </li><!-- /Meble i wyposażenie -->
      <li class="mb-1">
        <button class="btn btn-toggle text-left border rounded collapsed w-100" data-bs-toggle="collapse" data-bs-target="#toysedu" aria-expanded="false">
          Zabawki i edukacja
        </button>
        <div class="collapse pl-4" id="toysedu">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li>
            <a href="#" class="align-items-center collapsed link-dark rounded nav-link" data-bs-toggle="collapse" data-bs-target="#toys" aria-expanded="false">
                 <span class="menu-title">Zabawki</span>
                <i class="ti-angle-down"></i>
               </a>
               <div class="collapse pl-2" id="toys">
                 <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                   <li><a href="{{ route('frontShow', 'PLUSZOWE') }}" class="link-dark rounded nav-link">PLUSZOWE</a></li>
                   <li><a href="{{ route('frontShow', 'PLASTIKOWE') }}" class="link-dark rounded nav-link">PLASTIKOWE</a></li>
                   <li><a href="{{ route('frontShow', 'EDUKACYJNE') }}" class="link-dark rounded nav-link">EDUKACYJNE</a></li>
                   <li><a href="{{ route('frontShow', 'DREWNIANE') }}" class="link-dark rounded nav-link">DREWNIANE ?</a></li>
                 </ul>
               </div>
            </li>
            <li><a href="{{ route('frontShow', 'GRYZAKI I GRZECHOTKI') }}" class="link-dark rounded nav-link">Gryzaki i grzechotki</a></li>
            <li><a href="{{ route('frontShow', 'ZABEZPIECZENIA') }}" class="link-dark rounded nav-link">Zabezpieczenia</a></li>
          </ul>
        </div>
      </li><!-- /Zabawki i edukacja -->
      <li class="mb-1">
        <button class="btn btn-toggle text-left border rounded collapsed w-100" data-bs-toggle="collapse" data-bs-target="#healthcare" aria-expanded="false">
          Pielęgnacja i higiena
        </button>
        <div class="collapse pl-4" id="healthcare">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('frontShow', 'KOSMETYKIPIELĘGNACYJNE') }}" class="link-dark rounded nav-link">Kosmetyki pielęgnacyjne</a></li>
            <li><a href="{{ route('frontShow', 'SZCZOTKI DO BUTELEK') }}" class="link-dark rounded nav-link">Szczotki do butelek</a></li>
            <li><a href="{{ route('frontShow', 'HIGIENA JAMY USTNEJ') }}" class="link-dark rounded nav-link">Higiena jamy ustnej</a></li>
            <li>
            <a href="#" class="align-items-center collapsed link-dark rounded nav-link" data-bs-toggle="collapse" data-bs-target="#bath" aria-expanded="false">
              <span class="menu-title">Kąpiel</span>
                <i class="ti-angle-down"></i>
               </a>
               <div class="collapse pl-2" id="bath">
                 <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                   <li><a href="{{ route('frontShow', 'OKRYCIA I RĘCZNIKI') }}" class="link-dark rounded nav-link">OKRYCIA I RĘCZNIKI</a></li>
                   <li><a href="{{ route('frontShow', 'MATY EDUKACYJNE') }}" class="link-dark rounded nav-link">MATY EDUKACYJNE</a></li>
                   <li><a href="{{ route('frontShow', 'WANNY') }}" class="link-dark rounded nav-link">WANNY</a></li>
                   <li><a href="{{ route('frontShow', 'STOPNIE') }}" class="link-dark rounded nav-link">STOPNIE</a></li>
                   <li><a href="{{ route('frontShow', 'NAKŁADKI NA WC') }}" class="link-dark rounded nav-link">NAKŁADKI NA WC</a></li>
                   <li><a href="{{ route('frontShow', 'NOCNIKI') }}" class="link-dark rounded nav-link">NOCNIKI</a></li>
                   <li><a href="{{ route('frontShow', 'LEŻACZKI DO WANNY') }}" class="link-dark rounded nav-link">LEŻACZKI DO WANNY</a></li>
                 </ul>
               </div>
            </li>
          </ul>
        </div>
      </li><!-- /Pielęgnacja i higiena -->
      <li class="mb-1">
        <button class="btn btn-toggle text-left border rounded collapsed w-100" data-bs-toggle="collapse" data-bs-target="#feeding" aria-expanded="false">
          Karmienie
        </button>
        <div class="collapse pl-4" id="feeding">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('frontShow', 'NACZYNIA I SZTUĆCE') }}" class="link-dark rounded nav-link">Naczynia i sztućce</a></li>
            <li><a href="{{ route('frontShow', 'BUTELKI I KUBKI') }}" class="link-dark rounded nav-link">Butelki i kubki</a></li>
            <li><a href="{{ route('frontShow', 'KUBKI') }}" class="link-dark rounded nav-link">Kubki</a></li>
            <li><a href="{{ route('frontShow', 'SZTUĆCE I TALERZYKI') }}" class="link-dark rounded nav-link">SZTUĆCE I TALERZYKI ?</a></li>
            <li><a href="{{ route('frontShow', 'ŚLINIAKI') }}" class="link-dark rounded nav-link">Śliniaki</a></li>
          </ul>
        </div>
      </li><!-- /Karmienie -->
      <li><a href="{{ route('frontShow', 'AKCESORIA') }}" class="btn btn-toggle-nav text-left link-dark rounded border w-100 mb-1">Akcesoria</a></li>
      <li><a href="{{ route('frontShow', 'PROMOCJE') }}" class="btn btn-toggle-nav text-left link-dark rounded border w-100 mb-1">Promocje ?</a></li>
      <li><a href="{{ route('frontShow', 'WYPRZEDAŻ') }}" class="btn btn-toggle-nav text-left link-dark rounded border w-100 mb-1">Wyprzedaż</a></li>
    </ul>
  </div>
</div>
<a class="nav-link shadow sticky-top border px-4 py-3 m-2 bg-light position-fixed top-1 start-0" data-bs-toggle="offcanvas" href="#sidebar" role="button" aria-controls="offcanvasExample">
    <i class="ti-angle-double-right"></i>
</a>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const stickyEl = document.querySelector('.sticky-top');
    const originalOffset = stickyEl.offsetTop;

    window.addEventListener('scroll', function() {
        const scrollPos = window.scrollY;

        if (scrollPos > originalOffset) {
            stickyEl.style.position = 'fixed';
            stickyEl.style.top = '0';
            stickyEl.style.left = '0';
        } else {
            stickyEl.style.position = '';
            stickyEl.style.top = '0';
            stickyEl.style.left = '0';
        }
    });
});

</script>