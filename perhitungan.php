<?php
 // Koneksi
include 'aksilogin/config.php';
 session_start();
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:index.php");
}
?>

<?php $page = 'perhitungan'; include './template/header.php';
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

                <h3>Perhitungan</h3>


 <?php
// $bobot = array(0.30,0.20,0.30,0.20);



 //Buat fungsi tampilkan nama
 function getNama($id){
  $q =mysql_query("SELECT * FROm tb_alternatif where id_alternatif = '$id'");
  $d = mysql_fetch_array($q);
  return $d['nama_alternatif'];
 }
 
 //Setelah bobot terbuat select semua di tabel Matrik


 $qkriteria = mysql_query("SELECT * from kriteria");

 $sql = mysql_query("SELECT * FROM tb_nilai");
 //Buat tabel untuk menampilkan hasil
 echo "<H3>Matrik Awal</H3>
 <table class='table table-bordered table-striped' >
 <thead>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>";

   while ($qk = mysql_fetch_array($qkriteria)) {
     echo "<td style='text-align:center;'>".$qk['nama_kriteria']."</td>";
   }
   // <td style='text-align:center;'>C1</td>
   // <td style='text-align:center;'>C2</td>
   // <td style='text-align:center;'>C3</td>
   // <td style='text-align:center;'>C4</td>
   echo "<td style='text-align:center;'>jumlah poin</td>
  </tr>
  </thead>
  <tbody>
  ";
 $no = 1;
 while ($dt = mysql_fetch_array($sql)) {
  $jumlah= ($dt['kriteria1'])+($dt['kriteria2'])+($dt['kriteria3'])+($dt['kriteria4'])+($dt['kriteria5']);
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt['id_alternatif'])."</td>
   <td style='text-align:center;'>$dt[kriteria1]</td>
   <td style='text-align:center;'>$dt[kriteria2]</td>
   <td style='text-align:center;'>$dt[kriteria3]</td>
   <td style='text-align:center;'>$dt[kriteria4]</td>
   <td style='text-align:center;'>$dt[kriteria5]</td>
   <td style='text-align:center;'>$jumlah</td>
  </tr>";
 $no++;
 }
 echo "</tbody></table>";

 //Lakukan Normalisasi dengan rumus pada langkah 2
 //Cari Max atau min dari tiap kolom Matrik
 $cr = mysql_query("SELECT 
      min(kriteria1) as minK1, 
      min(kriteria2) as minK2,
      min(kriteria3) as minK3,
      min(kriteria4) as minK4,
      min(kriteria5) as minK5,
      max(kriteria1) as maxK1,
      max(kriteria2) as maxK2,
      max(kriteria3) as maxK3,
      max(kriteria4) as maxK4,
      max(kriteria5) as maxK5 
   FROM tb_nilai");
 $atribut = mysql_fetch_array($cr);

 //$kriteria = mysql_query("SELECT (atribute) as atr  FROM kriteria")
 
 //Hitung Normalisasi tiap Elemen
 $sql2 = mysql_query("SELECT * FROM tb_nilai");
 //Buat tabel untuk menampilkan hasil
$qkriteria = mysql_query("SELECT * from kriteria");
 echo "<br><H3>Matrik Normalisasi</H3>
 <table class='table table-bordered' >
 <thead>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>";

   while ($k = mysql_fetch_array($qkriteria)) {
     echo "<td style='text-align:center;'>".$k['nama_kriteria']."</td>";
    // var_dump($k['nama_kriteria']);
   }
   // <td style='text-align:center;'>C1</td>
   // <td style='text-align:center;'>C2</td>
   // <td style='text-align:center;'>C3</td>
   // <td style='text-align:center;'>C4</td>
  echo "</tr>
  </thead>
  <tbody>
  ";

$k1 = "";
$k2 = "";
$k3 = "";
$k4 = "";
$k5 = "";

$qk = mysql_query("SELECT * FROM kriteria");
while ($row = mysql_fetch_array($qk)) {
    if ($row['atribute'] == "cost") {
      if ($row['id_kriteria'] == 1) {
        $k1 = "cost";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "cost";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "cost";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "cost";
      } elseif ($row['id_kriteria'] == 5) {
        $k5 = "cost";
      }
    } else {
      if ($row['id_kriteria'] == 1) {
        $k1 = "benefit";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "benefit";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "benefit";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "benefit";
      } elseif ($row['id_kriteria'] == 5) {
        $k5 = "benefit";
      }
    }
}

 $no = 1;
 while ($dt2 = mysql_fetch_array($sql2)) {
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt2['id_alternatif'])."</td>
   <td style='text-align:center;'>";
        if ($k1 == "cost") {
          echo round($dt2['kriteria1']/$atribut['minK1'],2);
        } else {
          echo round($dt2['kriteria1']/$atribut['maxK1'],2);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k2 == "cost") {
          echo round($dt2['kriteria2']/$atribut['minK2'],2);
        } else {
          echo round($dt2['kriteria2']/$atribut['maxK2'],2);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k3 == "cost") {
          echo round($dt2['kriteria3']/$atribut['minK3'],2);
        } else {
          echo round($dt2['kriteria3']/$atribut['maxK3'],2);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k4 == "cost") {
          echo round($dt2['kriteria4']/$atribut['minK4'],2);
        } else {
          echo round($dt2['kriteria4']/$atribut['maxK4'],2);
        }
   echo "</td>
   <td style='text-align:center;'>";
       if ($k5 == "cost") {
         echo round($dt2['kriteria5']/$atribut['minK5'],2);
       } else {
         echo round($dt2['kriteria5']/$atribut['maxK5'],2);
       }
  echo "</td>
 </tr>";
 $no++;
 }
 echo "</tbody></table>";


 //Proses perangkingan dengan rumus langkah 3
 $sql3 = mysql_query("SELECT * FROM tb_nilai");

 //Buat tabel untuk menampilkan hasil
 echo "<H3>Perangkingan</H3>
 <table class='table table-bordered'>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>
   <td style='text-align:center;'>Jumlah Perhitungan</td>
   <td style='text-align:center;'>Keterangan</td>
  </tr>
  ";


$bobotArray = array('');

$qb = mysql_query("SELECT * from kriteria");

while ($b = mysql_fetch_array($qb)) {
  // $bobotArray = $bobot['bobot'];
  array_push($bobotArray, $b['bobot']);
}

//Kita gunakan rumus (Normalisasi x bobot)
 while ($dt3 = mysql_fetch_array($sql3)) {
  //$jumlah= ($dt3['kriteria1'])+($dt3['kriteria2'])+($dt3['kriteria3'])+($dt3['kriteria4']);

  $normalisasi1 = 0;
  $normalisasi2 = 0;
  $normalisasi3 = 0;
  $normalisasi4 = 0;
  $normalisasi5 = 0;

if ($k1 == "cost") {
    $normalisasi1 = $dt3['kriteria1']/$atribut['minK1'];
} else {
  $normalisasi1 = $dt3['kriteria1']/$atribut['maxK1'];
} 
if ($k2 == "cost") {
    $normalisasi2 = $dt3['kriteria2']/$atribut['minK2'];
} else {
  $normalisasi2 = $dt3['kriteria2']/$atribut['maxK2'];
}
if ($k3 == "cost") {
    $normalisasi3 = $dt3['kriteria3']/$atribut['minK3'];
} else {
  $normalisasi3 = $dt3['kriteria3']/$atribut['maxK3'];
}
if ($k4 == "cost") {
    $normalisasi4 = $dt3['kriteria4']/$atribut['minK4'];
} else {
  $normalisasi4 = $dt3['kriteria4']/$atribut['maxK4'];
}
if ($k5 == "cost") {
  $normalisasi5 = $dt3['kriteria5']/$atribut['minK5'];
} else {
  $normalisasi5 = $dt3['kriteria5']/$atribut['maxK5'];
}

$poin= round( 
   ($normalisasi1*$bobotArray[1])+
   ($normalisasi2*$bobotArray[2])+
   ($normalisasi3*$bobotArray[3])+
   ($normalisasi4*$bobotArray[4])+
   ($normalisasi5*$bobotArray[5]),2);
   
  // $poin= round(
  //  (($dt3['kriteria1']/$atribut['minK1'])*$bobotArray[1])+
  //  (($dt3['kriteria2']/$atribut['minK2'])*$bobotArray[2])+
  //  (($dt3['kriteria3']/$atribut['maxK3'])*$bobotArray[3])+
  //  (($dt3['kriteria4']/$atribut['maxK4'])*$bobotArray[4]),3);

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
   $h="peringkat";
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


<a href="cetak_perhitungan.php" target="_blank" class="btn btn-danger"><i class="fas fa-print"> Cetak</i></a>
 </div>
  </div>
   </div>
    </div>
      </div>
<?php
include './template/footer.php';
?>