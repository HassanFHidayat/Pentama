<?php 
include './aksilogin/config.php'; 

session_start();

if ($_SESSION['status'] !="login") {
  header("location:index.php");
}
?>

<?php $page = 'data_siswa'; include './template/header.php';
?>

<?php include './template/navbar.php';
?>

<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">

                <h3>Tambah Data Calon Prajurit</h3>
								<div class="card-body">
									<div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <form action="./siswa/input_siswa.php" method="post">
                                            <div class="form-group">
                                                <label>No Peserta</label>
                                                <input type="text" class="form-control" name="no_peserta" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" required>
                                            </div> 
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="alamat" required>
                                            </div>
                                            <div class="form-group">
                                                <label>TTL</label>
                                                <input type="text" class="form-control" name="ttl" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <input type="text" class="form-control" name="agama" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Pend Terakhir</label>
                                                <input type="text" class="form-control" name="pend_terakhir" required>
                                            </div>
                                
                                    <td><button class="btn btn-success" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>


<?php
include './template/footer.php';
?>