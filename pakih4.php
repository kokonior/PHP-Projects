<!-- ======= Header ======= -->
<header id="header" class="fixed-top navbar-light" style="background-color: white;font-weight:bold;">

	<div class="container d-flex">
		<div class="logo mr-auto">
			<h1><a href="index.html"><img src="<?php echo base_url('assets/'); ?>img/176870.png" style="margin: -10px -0px 0px 0px;" alt="Logo <?php echo $namaPerusahaan; ?>"></a></h1>
		</div>

		<nav class="nav-menu d-none d-lg-block">
			<ul>
				<li> <a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
				<li> <a href="<?php echo site_url('About-us') ?>"><?php echo get_phrase('Tentang Kami') ?></a></li>
				<li> <a href="<?php echo site_url('Our-Products') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
				<li class="active"> <a href="<?php echo site_url('Photo-Gallery') ?>"><?php echo get_phrase('Galeri Foto') ?></a></li>
				<li> <a href="<?php echo site_url('Contacts') ?>"><?php echo get_phrase('Hubungi Kami') ?></a></li>
				<li>
					<a href="#" class="" data-toggle="dropdown">
						<?php echo get_phrase('Pilih Bahasa'); ?>
						<img src="<?php echo base_url('assets/') ?>flag/id.png">&nbsp;<img src="<?php echo base_url('assets/') ?>flag/en.png">
						&nbsp;
						<i class="ace-icon fa fa-angle-down bigger-110"></i>
					</a>

					<ul class="dropdown-menu dropdown-light-blue dropdown-caret">
						<?php

						$fields = $this->db->list_fields('language');

						foreach ($fields as $field) {

							if ($field == 'phrase_id' || $field == 'phrase') continue;

						?>

							<li>

								<a href="<?php echo base_url(); ?>Multilanguage/select_language/<?php echo $field; ?>" style="color:black;">

									<?php echo $field; ?>

									<?php //selecting current language

									if ($this->session->userdata('current_language') == $field) : ?>

										<i class="icon-ok"></i>

									<?php endif; ?>

								</a>

							</li>

						<?php

						}

						?>
					</ul>
				</li>
			</ul>
		</nav><!-- .nav-menu -->
	</div>
</header><!-- End Header -->

<!-- ======= Page Property  ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 style="font-weight:bold;"><?php echo get_phrase('Galeri Foto') ?></span></h2>
          <ol>
					<li><a href="<?php echo site_url('Beranda_c') ?>"><?php echo get_phrase('Beranda') ?></a></li>
							<li><?php echo get_phrase('Galeri Foto') ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs --><!-- End Page Properti -->

<main id="main">

	<!-- ======= Page Galeri ======= -->
	<div id="portfolio" class="portfolio-area area-padding-3 fix">
		
	
	<section id="portfolio" class="portfolio">
      <div class="container fadeInDown">
			
        <div class="row wow fadeInUp">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
							<?php foreach ($album as $a) : ?>
              <li data-filter=".filter-<?php echo $a['id_album']; ?>"><?php if ($this->session->userdata('current_language') == 'English') { ?>
							<?php echo $a['nama_album_en']; ?>
						<?php } else { ?>
							<?php echo $a['nama_album']; ?>
						<?php } ?></li>
						<?php endforeach; ?>
            </ul>
          </div>
        </div>
				
        <div class="row portfolio-container wow fadeInUp">
				<?php foreach ($album as $a) : ?>
				<?php foreach ($galeri->getPhotoByAlbum($a['id_album'])->result() as $result) : ?>
					
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $a['id_album']; ?>">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" alt="<?php echo $a['nama_album'] . ' - ' . $namaPerusahaan; ?>" class="img-fluid"  alt="">
              <div class="portfolio-info">
                
                <p><?php if ($this->session->userdata('current_language') == 'English') { ?>
							<?php echo $a['nama_album_en']; ?>
						<?php } else { ?>
							<?php echo $a['nama_album']; ?>
						<?php } ?></p>
                <div class="portfolio-links">
                  <a href="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" class="glightbox" ><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

					<?php endforeach; ?>
					
				<?php endforeach; ?>
        </div>
      </div>
    </section>
	</div>
</main><!-- End #main -->
<script src="<?php echo base_url('assets2/'); ?>vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo base_url('assets2/'); ?>vendor/aos/aos.js"></script>
  <script src="<?php echo base_url('assets2/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('assets2/'); ?>vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url('assets2/'); ?>js/main.js"></script>

