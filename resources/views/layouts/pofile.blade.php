
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin')}}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{asset('admin')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('admin')}}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{asset('admin')}}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('admin')}}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('admin')}}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
     <!-- Toastr CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     <!-- Toastr CSS -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin')}}/images/favicon.png" />
    <style>
         .toast-success {
            background-color: #51A351 !important; /* Custom Green */
            color: #fff !important;
        }
    </style>

  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
          <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">

              <div class="d-flex align-items-center justify-content-between">
                <a href="https://www.bootstrapdash.com/product/star-admin-pro/"><i class="ti-home me-3 text-white"></i></a>
                <button id="bannerClose" class="btn border-0 p-0">
                  <i class="ti-close text-white"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
              </button>
            </div>
            <div>
              <a class="navbar-brand brand-logo" href="index.html">
                <img src="{{asset('admin')}}/images/logo.svg" alt="logo" />
              </a>
              <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="{{asset('admin')}}/images/logo-mini.svg" alt="logo" />
              </a>
            </div>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
              <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
                <h3 class="welcome-sub-text">Your performance summary this week </h3>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                  <a class="dropdown-item py-3">
                    <p class="mb-0 fw-medium float-start">Select category</p>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow py-2">
                      <p class="preview-subject ellipsis fw-medium text-dark">Bootstrap Bundle </p>
                      <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards</p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow py-2">
                      <p class="preview-subject ellipsis fw-medium text-dark">Angular Bundle</p>
                      <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular projects</p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow py-2">
                      <p class="preview-subject ellipsis fw-medium text-dark">VUE Bundle</p>
                      <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow py-2">
                      <p class="preview-subject ellipsis fw-medium text-dark">React Bundle</p>
                      <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item d-none d-lg-block">
                <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                  <span class="input-group-addon input-group-prepend border-right">
                    <span class="icon-calendar input-group-text calendar-icon"></span>
                  </span>
                  <input type="text" class="form-control">
                </div>
              </li>
              <li class="nav-item">
                <form class="search-form" action="#">
                  <i class="icon-search"></i>
                  <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                </form>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="icon-bell"></i>
                  <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                  <a class="dropdown-item py-3 border-bottom">
                    <p class="mb-0 fw-medium float-start">You have 4 new notifications </p>
                    <span class="badge badge-pill badge-primary float-end">View all</span>
                  </a>
                  <a class="dropdown-item preview-item py-3">
                    <div class="preview-thumbnail">
                      <i class="mdi mdi-alert m-auto text-primary"></i>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                      <p class="fw-light small-text mb-0"> Just now </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item py-3">
                    <div class="preview-thumbnail">
                      <i class="mdi mdi-lock-outline m-auto text-primary"></i>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                      <p class="fw-light small-text mb-0"> Private message </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item py-3">
                    <div class="preview-thumbnail">
                      <i class="mdi mdi-airballoon m-auto text-primary"></i>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                      <p class="fw-light small-text mb-0"> 2 days ago </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="icon-mail icon-lg"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                  <a class="dropdown-item py-3">
                    <p class="mb-0 fw-medium float-start">You have 7 unread mails </p>
                    <span class="badge badge-pill badge-primary float-end">View all</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="{{asset('admin')}}/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow py-2">
                      <p class="preview-subject ellipsis fw-medium text-dark">Marian Garner </p>
                      <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="{{asset('admin')}}/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow py-2">
                      <p class="preview-subject ellipsis fw-medium text-dark">David Grey </p>
                      <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="{{asset('admin')}}/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow py-2">
                      <p class="preview-subject ellipsis fw-medium text-dark">Travis Jenkins </p>
                      <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">

                  {{-- <img class="img-xs rounded-circle" src="{{asset('admin')}}/images/faces/face8.jpg" alt="Profile image"> --}}
              @if(Auth::user()->photo)
                <img class="img-xs rounded-circle" src="{{ asset(Auth::user()->photo) }}" alt="Profile image">
              @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="dropdown-header text-center">
                    <img class="img-md rounded-circle" src="{{asset('admin')}}/images/faces/face8.jpg" alt="Profile image">
                    <p class="mb-1 mt-3 fw-semibold"></p>
                    <p class="fw-light text-muted mb-0"> {{ Auth::user()->name }}</p>
                  </div>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>

              </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                  <i class="mdi mdi-grid-large menu-icon"></i>
                  <span class="menu-title">back public page</span>
                </a>
              </li>
              <li class="nav-item nav-category">UI Elements</li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <i class="menu-icon mdi mdi-floor-plan"></i>
                  <span class="menu-title">UI Elements</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="">categori</a></li>

                    <li class="nav-item"> <a class="nav-link" href="">product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">orderlist</a></li>
                  </ul>
                </div>
              </li>



            </ul>
          </nav>
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">

              <div class="row">


 @if (session('resent'))
    <div class="alert alert-success">
        A fresh verification link has been sent to your email address.
    </div>
@endif

@if (Auth::user() && !Auth::user()->hasVerifiedEmail())
    <div class="alert alert-warning">
        Please verify your email address.
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-link">Resend verification email</button>
        </form>
    </div>
@endif

                    @yield('maincontent')



              </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
                <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights reserved.</span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('admin')}}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{asset('admin')}}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin')}}/vendors/chart.js/chart.umd.js"></script>
    <script src="{{asset('admin')}}/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin')}}/js/off-canvas.js"></script>
    <script src="{{asset('admin')}}/js/template.js"></script>
    <script src="{{asset('admin')}}/js/settings.js"></script>
    <script src="{{asset('admin')}}/js/hoverable-collapse.js"></script>
    <script src="{{asset('admin')}}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('admin')}}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{asset('admin')}}/js/dashboard.js"></script>
    <!-- <script src="{{asset('admin')}}/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
    {{-- toastr cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 {{-- toastr cdn --}}
 {{-- sweet alert cdn --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('footeer_script')
  </body>
</html>
 {{-- toastr script start --}}
 <script>
    @if(Session::has('success'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showDuration": "300",
        "hideDuration": "1000",
    };
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif
</script>
{{-- toastr script start --}}
