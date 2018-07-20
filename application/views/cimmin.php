<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">

  <!-- Iconic Icon -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <title>Fadama - Digital Portofoliio</title>
  </head>
  <body>
    <div class="container">
      <ul class="nav justify-content-center">
        <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/user/') ?>">Submit</a>
        </li>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2 form-control-sm" type="search" placeholder="Search" aria-label="Search" id="cari-judul">
          <button class="btn btn-sm btn-primary" id="btn-cari">Search</button>
        </form>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Wallpaper</a>
          <a class="dropdown-item" href="#">Portofolio</a>
          <a class="dropdown-item" href="#">Help & FAQ</a>
          </div>
        </li>
      </ul>
    </div>