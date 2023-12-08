<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src="{{ asset('backend/assets/images/logos/dark-logo.svg')}}" width="180" alt="" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('backend.dashboard') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Data Perusahaan</span>
        </li>
        {{-- @if($user && $user->level == 2) --}}
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('backend.region') }}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Data Region</span>
          </a>
        </li>
        {{-- @endif --}}
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('backend.office') }}" aria-expanded="false">
            <span>
              <i class="ti ti-alert-circle"></i>
            </span>
            <span class="hide-menu">Data Kantor</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('backend.driver') }}" aria-expanded="false">
            <span>
              <i class="ti ti-cards"></i>
            </span>
            <span class="hide-menu">Data Driver</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('backend.transport') }}" aria-expanded="false">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Data Kendaraan</span>
          </a>
        </li>
        
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Data Pemesanan</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('backend.transportBooked') }}" aria-expanded="false">
            <span>
              <i class="ti ti-login"></i>
            </span>
            <span class="hide-menu">Pesan Kendaraan</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
            <span>
              <i class="ti ti-user-plus"></i>
            </span>
            <span class="hide-menu">Register</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">EXTRA</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
            <span>
              <i class="ti ti-mood-happy"></i>
            </span>
            <span class="hide-menu">Icons</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
            <span>
              <i class="ti ti-aperture"></i>
            </span>
            <span class="hide-menu">Sample Page</span>
          </a>
        </li>
      </ul>
      
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>