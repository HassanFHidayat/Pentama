<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
        <?php
    if (isset($page_title)) {
        echo $page_title;
    } else {
        echo 'SPK Penerima Prajurit Tamtama (TNI AD)';
    }
    ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


 
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">

        <a class="simple-text logo-normal">
                  <?php
    if (isset($page_title)) {
        echo $page_title;
    } else {
        echo 'SPK Penerima Prajurit Tamtama (TNI AD)';
    }
    ?>
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class= "<?php if ($page=='dashboard'){echo 'active';} ?>">
            <a href="dashboard.php">
              <i class="now-ui-icons design_app"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li>
            <li class= "<?php if ($page=='data_siswa'){echo 'active';} ?>">
            <a href="data_siswa.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Data Calon Prajurit</p>
            </a>
          </li>
          <li>
            <li class="<?php if ($page=='kriteria'){echo 'active';} ?>">
            <a href="kriteria.php">
              <i class="now-ui-icons location_map-big"></i>
              <p>Data Kriteria</p>
            </a>
          </li>
          <li>
            <li class="<?php if ($page=='alternatif'){echo 'active';} ?>">
            <a href="alternatif.php">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Data Alternatif</p>
            </a>
          </li>
          <li>
            <li class="<?php if ($page=='perhitungan'){echo 'active';} ?>">
            <a href="perhitungan.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Perhitungan</p>
            </a>
          </li>
          <li>
            <li class="<?php if ($page=='user'){echo 'active';} ?>">
            <a href="user.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Data User</p>
            </a>
          </li>
          <li>

          <li class="active-pro">
            <a href="aksilogin/logout.php">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">