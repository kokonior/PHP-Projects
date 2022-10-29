<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Asgard Hotel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="vendor/aos/aos.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="#">AsgardHotel<span>.</span></a></h1>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('kamar-p') ? 'active' : '' }}" href="/kamar-p">Kamar</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('fasilitas') ? 'active' : '' }}" href="/fasilitas">Fasilitas</a></li>
                  </ul>
            </nav><!-- .navbar -->
            @guest
                <a href="/login" class="get-started-btn scrollto">Login</a>
            @else
            @if(Auth::user()->role === 'user')
                <a href="/home" class="get-started-btn scrollto">{{ Auth::user()->name }}</a>
            @elseif(Auth::user()->role === 'resepsionis')
                <a href="/resepsionis" class="get-started-btn scrollto">{{ Auth::user()->name }}</a>
            @elseif(Auth::user()->role === 'admin')
                <a href="/dashboard" class="get-started-btn scrollto">{{ Auth::user()->name }}</a>
            @endif

            @endguest
        </div>
    </header><!-- End Header -->

    <main class="mt-5">
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Fasilitas Hotel</h2>
                <p>Kami memiliki banyak fasilitas yang bisa anda gunakan selama anda menginap di Hotel kami.</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

            @foreach ($fasilitasHotel as $fh)
            <div class="swiper-slide">
            <div class="testimonial-wrap">
                <div class="testimonial-item">
                <img src="/storage/{{ $fh->image }}" class="img-fluid">
                <h3>{{ $fh->nama_fasilitas }}</h3>
                <h4>{{ $fh->keterangan }}</h4>
                </div>
            </div>
            </div><!-- End testimonial item -->
            @endforeach

            </div>
            <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    </main>
    <footer id="footer">

        <div class="footer-top">
          <div class="container">
            <div class="row">

              <div class="col-lg-3 col-md-6 footer-contact">
                <h3>AsgardHotel<span>.</span></h3>
                <p>
                  Wakanda Street<br>
                  Pasuruan, Jawa Timur<br>
                  Indonesia<br><br>
                  <strong>Phone:</strong> +62 8515 5188 578<br>
                  <strong>Email:</strong> info@asgardhotel.com<br>
                </p>
              </div>

              <div class="col-lg-2 col-md-6 footer-links">
                <h4>Konten Kami</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="/">Beranda</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="/kamar-p">Kamar</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="/fasilitas">Fasilitas</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Layanan Kami</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Hotel</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Village</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Cottage</a></li>
                </ul>
              </div>

              <div class="col-lg-4 col-md-6 footer-newsletter">
                <h4>Dapatkan Info Terbaru Tentang Kami</h4>
                <p>Jangan lupa untuk mendapatkan notifikasi update terbaru dari kami</p>
                <form action="" method="post">
                  <input type="email" name="email"><input type="submit" value="Subscribe">
                </form>
              </div>

            </div>
          </div>
        </div>

        <div class="container d-md-flex py-4">

          <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
              &copy; Copyright <strong><span>AsgardHotel</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
              Designed by <a href="https://instagram.com/ivankalan_">Ivanka Alan</a>
            </div>
          </div>
          <div class="social-links text-center text-md-end pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>
      </footer><!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="vendor/purecounter/purecounter.js"></script>
      <script src="vendor/aos/aos.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/glightbox/js/glightbox.min.js"></script>
      <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="vendor/swiper/swiper-bundle.min.js"></script>
      <script src="vendor/php-email-form/validate.js"></script>

      <!-- Template Main JS File -->
      <script src="js/main.js"></script>
      <script src="js/bootstrap.js"></script>
</body>

</html>
