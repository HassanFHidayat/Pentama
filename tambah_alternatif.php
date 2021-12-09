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

                <h3>Tambah Data Alternatif</h3>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 pr-1">
											<form action="./alternatif/input_alternatif.php" method="post">
	                     <div class="form-group">
                                <label>Nama Alternatif</label>
                                <select name="nama_alternatif" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">Pilih Alternatif...</option>
                                    
                                    <?php
                                    $query = "SELECT * FROM tb_siswa ORDER BY id asc";
                                    $hasil = mysql_query($query);
                                    while ($data = mysql_fetch_array($hasil)){
                                        echo "<option value='".$data['nama']."'>".$data['nama']."</option>";
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
												<input type="text" class="form-control" name="kriteria1" placeholder="Masukkan nilai dari 0-100" required>
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[1] ?></label>
												<input type="text" class="form-control" name="kriteria2" placeholder="Masukkan nilai dari 0-100" required>
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[2] ?></label>
												<input type="text" class="form-control" name="kriteria3" placeholder="Masukkan nilai dari 0-100" required>
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[3] ?></label>
												<input type="text" class="form-control" name="kriteria4" placeholder="Masukkan nilai dari 0-100" required >
											</div>
                            
                            <tr> 
                                <td></td>
                                <td><button class="btn btn-success" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>


<?php
include './template/footer.php';
?>