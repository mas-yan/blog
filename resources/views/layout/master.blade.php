<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('') }}assets/img/favicon.png">
  <title>
    @yield('title','Admin-Blog')
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('') }}assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('') }}assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
  <script src="https://kit.fontawesome.com/dbf5dfd73c.js" crossorigin="anonymous"></script>
  <link href="{{ asset('') }}assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('') }}assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  @yield('style')
</head>

<body class="g-sidenav-show  bg-gray-100">
  @include('layout.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    @include('layout.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @yield('content')
    </div>
    <div class="position-fixed top-0 end-0 p-3" style="display:none" id="live">
      <div id="liveToast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body font-weight-bold" id="message"></div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>
    
    <footer class="footer py-3 bg-white rounded shadow card mx-4">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </main>
  @include('layout.configuration')
  <!--   Core JS Files   -->
  <script src="{{ asset('') }}assets/js/core/popper.min.js"></script>
  <script src="{{ asset('') }}assets/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('') }}assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{ asset('') }}assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="{{ asset('') }}assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('') }}assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  <script>
    @if(session()->has('success'))
      var toastLiveExample = document.getElementById('liveToast')
      var live = document.getElementById('live')
      var message = document.getElementById('message')
      live.style.display = "block"
      message.innerText = '{{ session("success") }}'
      var toast = new bootstrap.Toast(toastLiveExample)
      toast.show()
    @endif
  </script>
  @yield('script')
</body>

</html>