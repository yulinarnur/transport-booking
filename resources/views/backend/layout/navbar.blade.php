<nav class="navbar navbar-expand-lg navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item d-block d-xl-none">
      <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link nav-icon-hover" href="javascript:void(0)">
        <i class="ti ti-bell-ringing"></i>
        <div class="notification bg-primary rounded-circle"></div>
      </a>
    </li>
  </ul>
  <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
      {{-- <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a> --}}
      <a href="#">
        {{ $user->name }}
      </a>
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
          aria-expanded="false">
          <img src="{{ asset('backend/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
          <div class="message-body">
            <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block" 
               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>