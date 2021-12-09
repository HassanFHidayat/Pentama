<?php 
 
include '../aksilogin/config.php';
$id = $_POST['id'];
// $no = $_POST['no'];
$no_peserta = $_POST['no_peserta'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$ttl = $_POST['ttl'];
$agama = $_POST['agama'];
$pend_terakhir = $_POST['pend_terakhir'];
// $bobot = $_POST['bobot'];

echo($id);
// echo($no);
echo($no_peserta);
echo($nama);
echo($alamat);
echo($ttl);
echo($agama);
echo($pend_terakhir);

mysql_query("UPDATE tb_siswa SET no_peserta='$no_peserta', nama='$nama', alamat='$alamat', ttl='$ttl', agama='$agama', pend_terakhir='$pend_terakhir' WHERE id='$id'");
 
header("location:../data_siswa.php?pesan=update");
 
?>

