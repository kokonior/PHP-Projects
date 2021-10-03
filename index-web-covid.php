<?php


$data = file_get_contents('https://ogyaadytm.tech/covid/api/');                                                   
$covid = json_decode($data);


$tanggal = $covid->tanggal_update;
$sembuh = $covid->sembuh;
$meninggal = $covid->meninggal;
$positif = $covid->positif;

$angka1 = $sembuh;
$sembuh = number_format($angka1,0,"",",");

$angka2 = $meninggal;
$meninggal = number_format($angka2,0,"",",");

$angka3 = $positif;
$positif = number_format($angka3,0,"",",");





?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- MyCSS -->
    <link rel="stylesheet" href="style.css">

    <title>Indonesian Corona Tracker</title>
  </head>
  <body>
 
    <!-- Navbar -->


    <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
        <div class="container">
        <a class="navbar-brand" href="#">#PakaiMasker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="https://ogyaadyatma.com">Blog</a>
            <a class="nav-item nav-link" href="#">Portofolio</a>
            <a class="nav-item nav-link" href="https://ogyaadytm.tech/covid/api">API For Developers</a>
            <a class="nav-item nav-link" href="https://instagram.com/ogya_adytm">Instagram</a>
          </div>
        </div>
      </nav>
    </div>

    
      <!-- End Navbar -->

      <!-- Jumbotron -->

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4 judul">Covid 19 Live Tracker</h1>
                <div class="row banner">
                    <div class="col-lg-6 deskripsi">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus voluptates modi necessitatibus architecto, unde eos sunt optio reiciendis deserunt? Modi incidunt reiciendis error repudiandae asperiores.
                        </p>
                    </div>
                    <div class="col">
                        <img src="https://maxsol.id/addons/default/themes/maxsol/img/covid19/virus-red.png?v=0.8" alt="covi" class="covid">
                    </div>
                </div>
            </div>
          </div>
      </div>
      <!-- End jumbotron -->

 <!-- Container -->
    <div class="container">
      <!-- panel -->
      <div class="row justify-content-center">
        <div class="col-12 info-panel">
          <div class="row semua">
            <div class="col-lg">
              <img src="img/indo.png" alt="employee" class="float-left rounded-circle">
              <h4>Indonesia</h2>
              <p>Update: <?=$tanggal?></p>
            </div>
            <div class="col-lg">
              <img src="img/smile.png" alt="employee" class="float-left rounded-circle">
              <h4>Sembuh</h2>
              <p>Total: <?=$sembuh?></p>
            </div>
            <div class="col-lg">
              <img src="img/sad.png" alt="employee" class="float-left rounded-circle">
              <h4>Positif</h2>
              <p>Total: <?=$positif?></p>
            </div>
            <div class="col-lg">
                <img src="img/nangis.png" alt="employee" class="float-left rounded-circle">
                <h4>Meninggal</h2>
                <p>Total: <?=$meninggal?></p>
              </div>
          </div>
        </div>
      </div>
    <!-- end panel -->
    </div>
    <!-- End Container -->

    <!-- footer -->
    <div class="container">
    <div class="row footer fluid">
      <div class="col text-center">
        <h5>2021 All Right Reserved by Ogya Adyatma.</h5>
      </div>
    </div>
    </div>
    <!-- End footer -->








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
