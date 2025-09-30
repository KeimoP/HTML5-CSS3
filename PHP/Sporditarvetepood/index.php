<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sporditarvete pood</title>
    <link rel="icon" href="./pildid/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/index.css">
  </head>
  <body>
    <?php include('header.php'); ?>
    <div class="jumbotron text-center text-white py-4"> 
    <h1 class="display-4">Täna ainult: 50% allahindlust!</h1>
    <p class="lead">Võta oma lemmik spordivarustus poole hinnaga! Kiirusta – pakkumine kehtib ainult täna!</p>
    <hr class="my-4">
    <p>Treeni targemini, paremaks ja odavamalt. Parimad sporditarbed ootavad sind!</p>
    <a class="btn btn-light btn-lg rounded-5" href="#tooted" role="button">Hangi kohe!</a>
</div>
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
  <div class="carousel-inner">
    <?php
        $pildid = glob('./reklaam/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        $esimene = true;
        foreach ($pildid as $pilt) {
            echo '<div class="carousel-item' . ($esimene ? ' active' : '') . '">';
            echo '<img src="' . $pilt . '" class="d-block w-100 img-fluid" style="max-height: 400px; object-fit: cover;" alt="">';
            echo '</div>';
            $esimene = false;
        }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php include('products.php'); ?>
<?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>