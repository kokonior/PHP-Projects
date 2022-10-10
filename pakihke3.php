<!-- ======= Header ======= -->
<header id="header" class="fixed-top navbar-light" style="background-color: white;font-weight:bold;">
  <div class="container d-flex" >
    <div class="logo mr-auto">
      <h1><a href="<?php echo site_url('Home') ?>"><img src="<?php echo base_url('assets/'); ?>img/176870.png" style="margin: -10px -0px 0px 0px;" alt="Logo <?php echo $namaPerusahaan; ?>"></a></h1>
    </div>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li> <a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
        <li class="active"> <a href="<?php echo site_url('About-us') ?>"><?php echo get_phrase('Tentang Kami') ?></a></li>
        <li> <a href="<?php echo site_url('Our-Products') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
        <li> <a href="<?php echo site_url('Photo-Gallery') ?>"><?php echo get_phrase('Galeri Foto') ?></a></li>
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


<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 style="font-weight:bold;"><?php echo get_phrase('Tentang Kami') ?></h2>
          <ol>
            <li><a href="<?php echo site_url('Beranda_c') ?>"><?php echo get_phrase('Beranda') ?></a></li>
            <li><?php echo get_phrase('Tentang Kami') ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<main id="main">

  <!-- ======= About Section ======= -->
	<?php foreach ($tentang->result() as $result) : ?>

<div id="about" class="about-area area-padding wow fadeInUp">
<div id="about" class="about wow fadeInUp">
	<div class="container" data-aos="fade-up"><br>
	<div class="row no-gutters">
	<div class="col-lg-6 d-flex flex-column justify-content-center about-content">

<div class="section-title">

<p><?php if ($this->session->userdata('current_language') == 'English') { ?>
                    <?php echo $result->deskripsi_tentang_en ?>
                  <?php } else { ?>
                    <?php echo $result->deskripsi_tentang ?>
                  <?php } ?></p>
</div>



</div>

<img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_tentang ?>" style="width: 500px;height:fit-content ;margin-top:100px;" alt="<?php echo $namaPerusahaan; ?>">
					<?php endforeach; ?>  
				</div>

	</div>
		</div>
</div><!-- End About Section -->


</main><!-- End #main -->
