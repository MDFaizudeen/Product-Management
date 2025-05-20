<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes.head')
</head>
<body>
    <div class="container">
        <header class="header">
            @include('includes.header')
        </header>
    </div>
    @if (Auth::check() &&  Auth::user()->role == 1)
    <div class="sidebar">
        @include('includes.sidebar')
    </div>
    @endif  
    <div class="card">
        @yield('card')
    </div>
    <div class="show">
        @yield('show')
    </div>
    <div class="footer">
        @include('includes.footer')
    </div>
      <!-- Vendor JS Files -->
  <script src="{{asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('vendor/quill/quill.js')}}"></script>
  <script src="{{asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>
</body>
</html>