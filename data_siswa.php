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

                <h3>Data Calon Prajurit</h3>
<h4><a class="btn btn-primary btn-sm" href="tambah_siswa.php">+ Tambah data</a></h4>
<table id="basic-datatables" class="display table table-striped table-hover" >
<?php 
if(isset($_GET['pesan'])){
	$pesan = $_GET['pesan'];
	if($pesan == "input"){
		echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di tambah.</div>';
	}else if($pesan == "update"){
		echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di update.</div>';
	}else if($pesan == "hapus"){
		echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di hapus.</div>';
	}
}
?>
											<thead>
												<tr>
												    <th>No</th>
													<th>No Peserta</th>
												    <th>Nama</th>
												    <th>Alamat</th>
													<th>TTL</th>
												    <th>Agama</th>
												    <th>Pend Terakhir</th>
													<th style='text-align:center;'>Opsi</th>												
												</tr>
											</thead>
											<tbody>
											<?php 
												$query_mysql = mysql_query("SELECT * FROM tb_siswa")or die(mysql_error());
												$nomor = 1;
												while($data = mysql_fetch_array($query_mysql))
												{ 
											?>
												  <tr>
												  <td><?php echo $nomor++; ?></td>
												  <td><?php echo $data['no_peserta']; ?></td>
												  <td><?php echo $data['nama']; ?></td>
												  <td><?php echo $data['alamat']; ?></td>
												  <td><?php echo $data['ttl']; ?></td>
												  <td><?php echo $data['agama']; ?></td>
												  <td><?php echo $data['pend_terakhir']; ?></td>
												  
												<td style='text-align:center;'><a class="btn btn-warning btn-sm" href="edit_siswa.php?id=<?php echo $data['id']; ?>"><i class="far fa-edit"> Edit</i></a> | <a class="btn btn-danger btn-sm" href="./siswa/hapus_siswa.php?id=<?php echo $data['id']; ?>"><i class="far fa-window-close"> Hapus</i></a></td>
												 </tr>
											<?php } ?>
											</tbody>	
										</table>
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
