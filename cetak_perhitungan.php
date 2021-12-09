<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:index.php");
}
?>


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
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>



					<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">

                <h2 style='text-align:center;'>Hasil Perhitungan</h2>

<?php
$bobot = array(0.30,0.20,0.30,0.20);



 //Buat fungsi tampilkan nama
 function getNama($id){
  $q =mysql_query("SELECT * FROm tb_alternatif where id_alternatif = '$id'");
  $d = mysql_fetch_array($q);
  return $d['nama_alternatif'];
 }
 
 //Setelah bobot terbuat select semua di tabel Matrik

 $sql = mysql_query("SELECT * FROM tb_nilai");
 //Buat tabel untuk menampilkan hasil
 echo "<H4>Matrik Awal</H4>
 <table class='table table-bordered' >
 <thead>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>
   <td style='text-align:center;'>C1</td>
   <td style='text-align:center;'>C2</td>
   <td style='text-align:center;'>C3</td>
   <td style='text-align:center;'>C4</td>
   <td style='text-align:center;'>Jumlah Poin</td>
  </tr>
  </thead>
  <tbody>
  ";
 $no = 1;
 while ($dt = mysql_fetch_array($sql)) {
  $jumlah= ($dt['kriteria1'])+($dt['kriteria2'])+($dt['kriteria3'])+($dt['kriteria4']);
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt['id_alternatif'])."</td>
   <td style='text-align:center;'>$dt[kriteria1]</td>
   <td style='text-align:center;'>$dt[kriteria2]</td>
   <td style='text-align:center;'>$dt[kriteria3]</td>
   <td style='text-align:center;'>$dt[kriteria4]</td>
   <td style='text-align:center;'>$jumlah</td>
  </tr>";
 $no++;
 }
 echo "</tbody></table>";

 //Lakukan Normalisasi dengan rumus pada langkah 2
 //Cari Max atau min dari tiap kolom Matrik
 $cr = mysql_query("SELECT min(kriteria1) as minK1, 
      min(kriteria2) as minK2,
      min(kriteria3) as minK3,
      min(kriteria4) as minK4,
      max(kriteria1) as maxK1,
      max(kriteria2) as maxK2,
      max(kriteria3) as maxK3,
      max(kriteria4) as maxK4 
   FROM tb_nilai");
 $atribut = mysql_fetch_array($cr);

 //$kriteria = mysql_query("SELECT (atribute) as atr  FROM kriteria")
 
 //Hitung Normalisasi tiap Elemen
 $sql2 = mysql_query("SELECT * FROM tb_nilai");
 //Buat tabel untuk menampilkan hasil
 
 echo "<br><H4>Matrik Normalisasi</H4>
 <table class='table table-bordered' >
 <thead>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>
   <td style='text-align:center;'>C1</td>
   <td style='text-align:center;'>C2</td>
   <td style='text-align:center;'>C3</td>
   <td style='text-align:center;'>C4</td>
  </tr>
  </thead>
  <tbody>
  ";

 $no = 1;
 while ($dt2 = mysql_fetch_array($sql2)) {
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt2['id_alternatif'])."</td>
   <td style='text-align:center;'>".round($dt2['kriteria1']/$atribut['minK1'],2)."</td>
   <td style='text-align:center;'>".round($dt2['kriteria2']/$atribut['minK2'],2)."</td>
   <td style='text-align:center;'>".round($dt2['kriteria3']/$atribut['maxK3'],2)."</td>
   <td style='text-align:center;'>".round($dt2['kriteria4']/$atribut['maxK4'],2)."</td>
  </tr>";
 $no++;
 }
 echo "</tbody></table>";


 //Proses perangkingan dengan rumus langkah 3
 $sql3 = mysql_query("SELECT * FROM tb_nilai");

 //Buat tabel untuk menampilkan hasil
 echo "<H4>Perangkingan</H4>
 <table class='table table-bordered'>
  <tr>
   <td style='text-align:center;'>no</td>
   <td>Nama</td>
   <td style='text-align:center;'>Jumlah Perhitungan</td>

   <td style='text-align:center;'>Keterangan</td>
  </tr>
  ";

//Kita gunakan rumus (Normalisasi x bobot)
 while ($dt3 = mysql_fetch_array($sql3)) {
  //$jumlah= ($dt3['kriteria1'])+($dt3['kriteria2'])+($dt3['kriteria3'])+($dt3['kriteria4']);
  $poin= round(
   (($dt3['kriteria1']/$atribut['minK1'])*$bobot[0])+
   (($dt3['kriteria2']/$atribut['minK2'])*$bobot[1])+
   (($dt3['kriteria3']/$atribut['maxK3'])*$bobot[2])+
   (($dt3['kriteria4']/$atribut['maxK4'])*$bobot[3]),3);

  $data[]=array('nama_alternatif'=>getNama($dt3['id_alternatif']),
      'poin'=>$poin);

 }

 //mengurutkan data
   foreach ($data as $key => $isi) {
    $nama[$key]=$isi['nama_alternatif'];
    
    $poin1[$key]=$isi['poin'];
   }
   array_multisort($poin1,SORT_DESC,$data);
   $no=1;
   $h="Peringkat";
   $peringkat=1;
   $hr=1;

   foreach ($data as $item) { ?>
   <tr>
   <td style='text-align:center;'><?php echo $no ?></td>
   <td><?php echo$item['nama_alternatif'] ?></td>
   
   <td style='text-align:center;'><?php echo$item['poin'] ?></td>
   <td style='text-align:center;'><?php echo"$h $peringkat" ?></td>
   </tr>
   <?php
   $no++;
   if ($no>=100) {
    $h="  ";
    $peringkat=" ";
   }else{
    $peringkat++;
   }

   }
   echo "</table>";


?>


</div>
</div>
</div>
</div>
             </div>
              </div>
            </div>
          </div>
        </div>



<script>
    window.print();
  </script>

<?php
include './template/footer.php';
?>
