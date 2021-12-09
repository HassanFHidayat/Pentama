<?php 
include 'aksilogin/config.php'; 

session_start();

if ($_SESSION['status'] !="login") {
  header("location:index.php");
}
?>

<?php $page = 'kriteria'; include './template/header.php';
?>

<?php include './template/navbar.php';
?>

                  <!-- End Navbar -->
 <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">

                <h3>Edit Data Kriteria</h3>

<div class="card-body">
									<div class="row">
										  <?php 
										  $id = $_GET['id_kriteria'];
										  $result = mysql_query("SELECT * FROM kriteria WHERE id_kriteria='$id'")or die(mysql_error());
										  $dataku = mysql_fetch_array($result);
										  $nomor = 1;
										 
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./kriteria/update_kriteria.php" method="post">
											<div class="form-group">
												<label>Kode</label>
												<input type="hidden" name="id_kriteria" value="<?php echo $dataku['id_kriteria'] ?>">
                        						<input disabled="" class="form-control" name="code" value="<?php echo $dataku['code'] ?>">
											</div> 
											<div class="form-group">
												<label>Nama Kriteria</label>
												<input type="text" class="form-control" name="nama_kriteria" value="<?php echo $dataku['nama_kriteria'] ?>">
												
											</div>
											<div class="form-group">
												<label>Atribute</label>
												<select name="atribute" class="form-control">
													<option value="0">Pilih Nilai...</option>
													<option value="cost" <?php if($dataku['atribute']=="cost") { echo"selected"; } ?> >Cost</option>
													<option value="benefit" <?php if($dataku['atribute']=="benefit") { echo"selected"; } ?> >Benefit</option>
														<?php
																/*
																<?php if($dataku['atribute']=="benefit") { echo"selected"; } ?>
																<?php if($dataku['atribute']=="cost") { echo"selected"; } ?>
																$query = "SELECT * FROM kriteria ORDER BY id_kriteria asc";
																$hasil = mysql_query($query);
																while ($data = mysql_fetch_array($hasil)){
																	if ($dataku['id_kriteria']==$data['id_kriteria']){
																		echo "<option value='$data[atribute]' selected='$dataku[id_sub]'>".$data['atribute']."</option>"; 
																	}else{
																		echo "<option value='$data[atribute]'>".$data['atribute']."</option>";
																	}
																}
																*/
															?>
												</select>
											</div>
											<div class="form-group">
												<label>Bobot</label>
												<input disabled="" class="form-control" class="form-control" name="bobot" value="<?php echo $dataku['bobot'] ?>">
											</div>
											
								
									<td><button class="btn btn-success" type="submit" value="Simpan">Simpan</td>
							
							</form>
								
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