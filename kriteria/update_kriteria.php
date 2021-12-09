<?php 
 
include '../aksilogin/config.php';
$id= $_POST['id_kriteria'];
// $code = $_POST['code'];
$nama_kriteria = $_POST['nama_kriteria'];
$atribute = $_POST['atribute'];
// $bobot = $_POST['bobot'];

mysql_query("UPDATE kriteria SET id_kriteria='$id', nama_kriteria='$nama_kriteria', atribute='$atribute' WHERE id_kriteria='$id'");
 
header("location:../kriteria.php?pesan=update");
 
?>