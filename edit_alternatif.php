<?php 
include './aksilogin/config.php'; 

session_start();

if ($_SESSION['status'] !="login") {
  header("location:index.php");
}
?>

<?php $page = 'alternatif'; include './template/header.php';
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

                <h3>Edit Data Alternatif</h3>
								<div class="card-body">
									<div class="row">
										  <?php 
										  $id_alternatif = (int) $_GET['id'];
										  $sql = "SELECT * FROM tb_alternatif p INNER JOIN tb_nilai b ON p.id_alternatif= b.id_alternatif where p.id_alternatif='$id_alternatif'";
										  $result = mysql_query($sql);
										  $dataku = mysql_fetch_array($result);
										  $nomor = 1;
										  
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./alternatif/update_alternatif.php" method="post">

											<div class="form-group">
												<label>Nama</label>
												<input type="hidden" name="id_alternatif" value="<?php echo $dataku['id_alternatif'] ?>">
                        						<select name="nama_alternatif" placeholder="Pilih Kriteria..." class="form-control">
                                    <option value="">Pilih Alternatif</option>
                                    
                                    <?php
                              		$query = "SELECT * FROM tb_siswa ORDER BY id asc";
                                    $hasil = mysql_query($query);
                                    while ($data = mysql_fetch_array($hasil)){
                                      echo "<option value='$data[nama]'" ;
                                        if ($data['nama'] == $dataku['nama_alternatif']) {
                                            echo "selected";
                                        }
                                        echo ">".$data['nama']."</option>"; 

                                        }
                                        
                              
                                    $kriteria = array();
                                    $kq = mysql_query("SELECT * from kriteria");
                                    while ($k = mysql_fetch_array($kq)) {
                                    	array_push($kriteria, $k['nama_kriteria']);
                                    }
                                    ?>
                                </select>
											</div> 
											<div class="form-group">
												<label><?php echo $kriteria[0] ?></label>
												<input type="text" class="form-control" name="kriteria1" value="<?php echo $dataku['kriteria1'] ?>">
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[1] ?></label>
												<input type="text" class="form-control" name="kriteria2" value="<?php echo $dataku['kriteria2'] ?>">
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[2] ?></label>
												<input type="text" class="form-control" name="kriteria3" value="<?php echo $dataku['kriteria3'] ?>">
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[3] ?></label>
												<input type="text" class="form-control" name="kriteria4" value="<?php echo $dataku['kriteria4'] ?>">
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[4] ?></label>
												<input type="text" class="form-control" name="kriteria5" value="<?php echo $dataku['kriteria5'] ?>">
											</div>
												
								
									<td><button id="displayNotif" class="btn btn-success" type="submit" value="Simpan">Simpan</td>
							
							</form>
							
							</div>
							
	
					</div>
					</div>
				</div>
			</div>



<script>
		$('#displayNotif').on('click', function(){
			var placementFrom = $('#notify_placement_from option:selected').val();
			var placementAlign = $('#notify_placement_align option:selected').val();
			var state = $('#notify_state option:selected').val();
			var style = $('#notify_style option:selected').val();
			var content = {};

			content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
			content.title = 'Bootstrap notify';
			if (style == "withicon") {
				content.icon = 'fa fa-bell';
			} else {
				content.icon = 'none';
			}
			content.url = 'index.html';
			content.target = '_blank';

			$.notify(content,{
				type: state,
				placement: {
					from: placementFrom,
					align: placementAlign
				},
				time: 1000,
				delay: 0,
			});
		});
	</script>
<?php
include './template/footer.php';
?>

