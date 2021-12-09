<?php 
error_reporting(E_ALL ^ E_DEPRECATED); 
$koneksi = mysql_connect('localhost','root','','db_spk');
mysql_select_db('db_spk');
?>