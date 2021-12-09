<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:index.php");
}
?>

<?php $page = 'dashboard'; include  './template/header.php';
?>

<?php
include './template/navbar.php';
?>

      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h2>Selamat Datang di Sistem Pendukung Keputusan Penerimaan Prajurit Tamtama (TNI AD) menggunakan Metode SAW</h2>
                <h5>Hello <i><?php echo $_SESSION['username']; ?></i> </h5>
              </div>
              <div class="card-body ">
                <div id="map" class="map"></div>

    </div>
  </div>
<?php
include './template/footer.php';
?>