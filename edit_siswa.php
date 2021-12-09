<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:index.php");
}
?>

<?php $page = 'data_siswa'; include  './template/header.php';
?>

<?php
 include './template/navbar.php';
?>


 <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">

                <h3>Edit Data Siswa</h3>

<div class="card-body">
									<div class="row">
										  <?php 
										  $id = $_GET['id'];
										  $query_mysql = mysql_query("SELECT * FROM tb_siswa WHERE id='$id'")or die(mysql_error());
										  $nomor = 1;
										  while($data = mysql_fetch_array($query_mysql)){
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./siswa/update_siswa.php" method="post">
											<div class="form-group">
												<label>No Peserta</label>	
                        						<input type="text" class="form-control" name="no_peserta" value="<?php echo $data['no_peserta'] ?>">
											</div> 
											<div class="form-group">
												<label>Nama</label>
												<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>">
											</div> 
											<div class="form-group">
												<label>Alamat</label>
												<input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>">
											</div>
											<div class="form-group">
												<label>TTL</label>
												<input type="text" class="form-control" name="ttl" value="<?php echo $data['ttl'] ?>">
											</div>
											<div class="form-group">
												<label>Agama</label>
												<input type="text" class="form-control" name="agama" value="<?php echo $data['agama'] ?>">
											</div>
											<div class="form-group">
												<label>Pend Terakhir</label>
												<input type="text" class="form-control" name="pend_terakhir" value="<?php echo $data['pend_terakhir'] ?>">
											</div>
								
									<td><button class="btn btn-success" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
							
							</form>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
					</div>
					</div>
				</div>
			</div>

<?php
include './template/footer.php';
?>