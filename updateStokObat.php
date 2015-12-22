<?php
	include 'konek.php';
	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];
	$produsen = $_POST['produsen'];
	$banyak = $_POST['banyak'];
	$kadaluarsa = $_POST['kadaluarsa'];
	$keterangan = $_POST['keterangan'];

	$update = mysql_query("update stokObat set nama='$nama', jenis='$jenis', produsen='$produsen', banyak='$banyak', kadaluarsa='$kadaluarsa', keterangan='$keterangan', where id='$id'");
	if ($update) {
	    header("location:stokObat.php");
	} else {
	    echo "gagal mengupdate data";
	}
?>