<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('backend/assets/images/logos/favicon.png') }} "/>
  <link rel="stylesheet" href="{{ asset('backend/assets/css/styles.min.css')}}" />

  {{-- template tabel --}}
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/simple-datatables/style.css')}}">

  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css')}}">
  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.svg')}}" type="image/x-icon">

  {{-- form layout --}}
  
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('backend/layout.sidebar')
    @include('backend/layout.navbar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    @yield('content')
  </div>
  <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('backend/assets/js/sidebarmenu.js')}}"></script>
  <script src="{{ asset('backend/assets/js/app.min.js')}}"></script>
  <script src="{{ asset('backend/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{ asset('backend/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{ asset('backend/assets/js/dashboard.js')}}"></script>
  {{-- tabel --}}
  <script src="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{ asset('backend/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
  <script>
      // Simple Datatable
      let table1 = document.querySelector('#table1');
      let dataTable = new simpleDatatables.DataTable(table1);
  </script>

  <script src="{{ asset('backend/assets/js/main.js')}}"></script>

  {{-- form layout --}}
</body>

</html>