<?php 
 
include '../aksilogin/config.php';

$id = $_POST['id'];
$no_peserta = $_POST['no_peserta'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$ttl = $_POST['ttl'];
$agama = $_POST['agama'];
$pend_terakhir = $_POST['pend_terakhir'];
// $bobot = $_POST['bobot'];


mysql_query("INSERT INTO tb_siswa VALUES('$id','$no_peserta','$nama','$alamat','$ttl','$agama','$pend_terakhir')");
header("location:../data_siswa.php?pesan=input");
 
?>