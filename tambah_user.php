<?php 
include './aksilogin/config.php'; 

session_start();

if ($_SESSION['status'] !="login") {
  header("location:index.php");
}
?>

<?php $page = 'user'; include './template/header.php';
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

                <h3>Tambah Data User</h3>

               <div class="card-body">
									<div class="row">
										<div class="col-md-6 pr-1">
											<form action="./user/input_user.php" method="post">
											<div class="form-group">
												<label>Nama</label>
                        						<input type="text" class="form-control" name="nama" required>
											</div> 
											<div class="form-group">
												<label>Username</label>
												<input type="text" class="form-control" name="username" required>
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="text" class="form-control" name="password" required>
											</div>
											
								
									<td><button class="btn btn-success" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
							
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
