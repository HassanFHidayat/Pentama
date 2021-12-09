<?php 
include '../aksilogin/config.php';
$id = $_GET['id'];
mysql_query("DELETE FROM tb_siswa WHERE id='$id'")or die(mysql_error());
 
header("location:../data_siswa.php?pesan=hapus");
?>

