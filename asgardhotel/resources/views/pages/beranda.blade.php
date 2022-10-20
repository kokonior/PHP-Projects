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

  <!========= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="row">
            <div class="col-xl-6">
            <h1>Temukan pengalaman liburan terbaik anda</h1>
            <h2>Rasakan kenyamanan dalam liburan anda dengan menginap di AsgardHotel</h2>
            @if (Auth::check() && Auth::user()->role === 'user')
                <a href="/pemesanan" class="btn-get-started scrollto">Pesan Sekarang</a>
            @else
                <a href="/login" class="btn-get-started scrollto">Pesan Sekarang</a>
            @endif
            </div>
        </div>
        </div>
    </section><!-- End Hero -->
    <main id="main">

        <div class="container">
            <div class="card my-5">
                <div class="card-body mb-2">

                    <div class="row">
                        <div class="col">
                            <label for="" class="form-label">Tanggal Check In</label>
                            <input type="date" class="form-control @error('tanggal_cek_in') is-invalid @enderror" name="tanggal_cek_in" placeholder="Tanggal Check In" value="{{ old('tanggal_cek_in') }}">
                            @error('tanggal_cek_in')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Tanggal Check Out</label>
                            <input type="date" class="form-control @error('tanggal_cek_out') is-invalid @enderror" name="tanggal_cek_out" placeholder="Tanggal Check Out" value="{{ old('tanggal_cek_out') }}">
                            @error('tanggal_cek_out')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Jumlah Kamar</label>
                            <input type="text" class="form-control @error('jumlah_kamar') is-invalid @enderror" name="jumlah_kamar" value="{{ old('jumlah_kamar') }}">
                            @error('jumlah_kamar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col col-sm-1 mt-4">
                            <a href="/login" class="btn btn-primary mt-2">Pesan</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="524" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Klien Puas</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="124" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Cabang Hotel</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jam Support</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Negara Tersedia</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Counts Section -->
        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">
                <div class="row no-gutters">
                    <div class="content col-xl-5 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Kami memberikan anda pengalaman menginap terbaik</h3>
                            <p>
                                Hotel kami menyediakan banyak pilihan kamar dengan berbagai macam fasilitas yang dapat anda gunakan untuk mendapatkan pengalaman menginap terbaik anda.
                            </p>
                        </div>
                        </div>
                        <div class="col-xl-7 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Banyak Pilihan Kamar</h4>
                                    <p>Kami menyediakan berbagai macam pilihan kamar dengan fasilitas terbaik untuk anda</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Lokasi Hotel Strategis</h4>
                                    <p>Semua hotel kami mempunyai lokasi yang strategis sehingga dapat memudahkan anda untuk melakukan aktivitas</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bx bx-images"></i>
                                    <h4>Desain Kamar Modern</h4>
                                    <p>Semua kamar dari hotel kami mempunyai desain yang elegan dan modern</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bx bx-shield"></i>
                                    <h4>Keamanan Terjamin</h4>
                                    <p>Jangan takut kehilangan barang-barang anda, hotel kami sudah dilengkapi dengan keamanan 24 Jam</p>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Kamar Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Tipe Kamar</h2>
                    <p> Hotel kami memiliki banyak tipe kamar yang dilengkapi dengan fasilitas-fasilitas terbaik dari kami yang dapat anda gunakan kapanpun.</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    @foreach ($kamar as $k)
                    <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                        <img src="/storage/{{ $k->image }}" class="img-fluid">
                        <h3>{{ $k->tipe_kamar }}</h3>
                        {{-- <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div> --}}
                        @foreach ($fasilitasKamar->where('kamar_id', $k->id) as $fk)
                        <ul>
                            <li>{{ $fk->nama_fasilitas }}</li>
                        </ul>
                        @endforeach
                        </div>
                    </div>
                    </div><!-- End testimonial item -->
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
                </div>
            </div>
            </section><!-- End Kamar Section -->

        <!-- ======= Fasilitas Hotel Section ======= -->
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
            </section><!-- End Fasilitas Hotel Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
            <h2>Testimoni Pelanggan</h2>
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                    <h3>Labib Mughny</h3>
                    <h4>Editor Berkelas</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Sangat betah rasanya menginap di Asgard Hotel, selain banyak fasilitas yang bisa saya gunakan, Asgard Hotel juga mempunyai banyak pilihan kamar yang menurut saya sangat unik
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div>
                </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>Wifqo Arova</h3>
                    <h4>Developer</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Menginap di Asgard Hotel memberikan saya suatu kenyamanan yang berbeda dari menginap di Hotel lain, saya bisa bekerja dengan santai saat saya menginap di Asgard Hotel
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div>
                </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                    <h3>Farhan Royani</h3>
                    <h4>Enterpreneur</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Dengan menginap di Asgard Hotel, saya bisa tetap bekerja dan bersantai dengan memanfaatkan fasilitas yang telah disediakan.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div>
                </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                <div class="testimonial-wrap">
                    <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                    <h3>Dhanendra</h3>
                    <h4>Data Scientist</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Menginap di Asgard Hotel memberikan saya pengalaman terbaik saat menginap di Hotel, selain pelayanan yang ramah, saya juga bisa menggunakan berbagai macam fasilitas yang disediakan
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div>
                </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
            </div>
        </div>
        </section><!-- End Testimonials Section -->
    </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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
