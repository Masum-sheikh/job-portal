


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>job portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('deshbord')}}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('deshbord')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('deshbord')}}/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>info@example.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>job portal</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="course.html" class="nav-item nav-link">Courses</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="detail.html" class="dropdown-item">Course Detail</a>
                            <a href="feature.html" class="dropdown-item">Our Features</a>
                            <a href="team.html" class="dropdown-item">Instructors</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <div class="d-none d-lg-block">
    @if (Route::has('login'))
        <div class="text-end">
            @auth
                {{-- Dropdown for Profile and Logout --}}
                <div class="btn-group">
                    <button type="button" class="btn btn-info py-2 px-4 dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        {{-- My Profile Link based on user type --}}
                        @if(auth()->user()->type == 'user')
                            <li><a class="dropdown-item" href="{{ route('home') }}">My Profile</a></li>
                        @elseif(auth()->user()->type == 'admin')
                            <li><a class="dropdown-item" href="{{ route('admin.home') }}">My Profile</a></li>
                        @elseif(auth()->user()->type == 'employee')
                            <li><a class="dropdown-item" href="{{ route('employee.home') }}">My Profile</a></li>
                        @endif

                        <li><hr class="dropdown-divider"></li>

                        {{-- Logout --}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                {{-- Guest: Show login and register --}}
                <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 text-white">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-success py-2 px-4 text-white ms-2">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>



                {{-- <a href="" class="btn btn-primary py-2 px-4 d-none d-lg-block">Join Us</a> --}}
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4">Learn From Home</h1>
            <h1 class="text-white display-1 mb-5">job serch</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <form action="{{ route('jobs.serch') }}" method="GET">
    <div class="input-group mb-4">
        <input type="text" name="keyword" value="{{ request('keyword') }}"
               class="form-control border-light" style="padding: 30px 25px;"
               placeholder="Keyword">
        <div class="input-group-append">
            <button class="btn btn-secondary px-4 px-lg-5">Search</button>
        </div>
    </div>
</form>

            </div>
        </div>
    </div>
    <!-- Header End -->


<div class="card mb-4">
{{-- my defrent table starte --}}

{{-- <h1>deferent table</h1>

 <div class="container mt-4">
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-sm">
      <thead>
        <tr class="text-center">
          <th rowspan="2">Style</th>
          <th rowspan="2">Color</th>
          <th rowspan="2">Size</th>
          <th rowspan="2">Cutting</th>
          <th colspan="2">Print Send</th>
          <th colspan="2">Print recived</th>
          <th rowspan="2">Shipment Qty</th>
        </tr>
        <tr class="text-center">
          <th>Send Qty</th>
          <th>Balance</th>
           <th>recived qty</th>
            <th>Balance <br>(send-recieved) </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td rowspan="3">FIRE 5243</td>
          <td rowspan="3">Black</td>
          <td>XS</td>
          <td class="text-right">100</td>
          <td class="text-right">80</td>
          <td class="text-right">20</td>
          <td class="text-right">50</td>
          <td class="text-right">50</td>
          <td class="text-right">50</td>
        </tr>
        <tr>
          <td>S</td>
          <td class="text-right">120</td>
          <td class="text-right">90</td>
          <td class="text-right">30</td>
          <td class="text-right">60</td>
          <td class="text-right">50</td>
          <td class="text-right">50</td>
        </tr>
        <tr>
          <td>M</td>
          <td class="text-right">150</td>
          <td class="text-right">100</td>
          <td class="text-right">50</td>
          <td class="text-right">70</td>
          <td class="text-right">50</td>
          <td class="text-right">50</td>
        </tr>
        <tr>
          <td colspan="3" class="text-center fw-bold">Total</td>
          <td class="text-right fw-bold">370</td>
          <td class="text-right fw-bold">270</td>
          <td class="text-right fw-bold">100</td>
          <td class="text-right fw-bold">180</td>
          <td class="text-right">50</td>
          <td class="text-right">50</td>
        </tr>
      </tbody>
    </table>
  </div>
</div> --}}


{{--my defrent table end --}}
    <div class="card-header">Browse Jobs</div>
    <div class="card-body">
        <div class="container">
            <div class="row">

                @foreach($jobs as $job)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="border p-3 h-100">
                            <h5>{{ $job->title }}</h5>
                            <p>{{ Str::limit($job->description, 100) }}</p>
                            <form action="{{ route('jobs.apply', $job->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Apply</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $jobs->links() }}
        </div>
    </div>
</div>


    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>Edukate</h1>
                    </a>
                    <p class="m-0">Accusam nonumy clita sed rebum kasd eirmod elitr. Ipsum ea lorem at et diam est, tempor rebum ipsum sit ea tempor stet et consetetur dolores. Justo stet diam ipsum lorem vero clita diam</p>
                </div>
                <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">Newsletter</h3>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Our Courses</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Web Design</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Apps Design</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Marketing</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Research</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>SEO</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Privacy Policy</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Terms & Condition</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Regular FAQs</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Help & Support</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; <a class="text-white" href="#">Your Site Name</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0">Designed by <a class="text-white" href="https://htmlcodex.com">HTML Codex</a> Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

   <!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('deshbord')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('deshbord')}}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{asset('deshbord')}}/lib/counterup/counterup.min.js"></script>
    <script src="{{asset('deshbord')}}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('deshbord')}}/js/main.js"></script>
</body>

</html>




