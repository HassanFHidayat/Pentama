<?php 
include 'aksilogin/config.php';
//mengaktifkan session
session_start();
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:index.php");
}
?>

<?php $page = 'kriteria'; include './template/header.php';
?>      


<?php
include './template/navbar.php';
?>


<?php 
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if($pesan == "input"){
      echo "Data berhasil di input.";
    }else if($pesan == "update"){
      echo "Data berhasil di update.";
    }else if($pesan == "hapus"){
      echo "Data berhasil di hapus.";
    }
  }
  ?>

      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">

                <h3>Data Kriteria</h3>

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
    <th>Kode</th>
    <th>Nama Kriteria</th>
    <th>Atribute</th>
    <th>Bobot</th>
    <th>Opsi</th>   
  </tr>
  </thead>
<?php 
$query_mysql = mysql_query("SELECT * FROM kriteria")or die(mysql_error());
$nomor = 1;
while($data = mysql_fetch_array($query_mysql)){
?>
<tr>
  <td><?php echo $nomor++; ?></td>
  <td><?php echo $data['code']; ?></td>
  <td><?php echo $data['nama_kriteria']; ?></td>
  <td><?php echo $data['atribute']; ?></td>
  <td><?php echo $data['bobot']; ?></td>
  <td>
  <a class="btn btn-primary" href="edit_kriteria.php?id_kriteria=<?php echo $data['id_kriteria']; ?>">Edit</a>
  </td>
</tr>
<?php } ?>
      </tbody>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
        </table>

  

              </div>
              <div class="card-body ">
                <div id="map" class="map"></div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>

          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
<?php
include './template/footer.php';
?>
