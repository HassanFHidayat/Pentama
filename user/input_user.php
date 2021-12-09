<?php 
 
include '../aksilogin/config.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
// $bobot = $_POST['bobot'];


mysql_query("INSERT INTO user VALUES('','$nama','$username','$password')");
header("location:../user.php?pesan=input");
 
?>