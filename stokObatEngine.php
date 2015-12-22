<?php
	if (isset($_POST['submit21'])) {
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$jenis=$_POST['jenis'];
		$produsen=$_POST['produsen'];
		$banyak=$_POST['banyak'];
		$kadaluarsa=$_POST['kadaluarsa'];
		$keterangan=$_POST['keterangan'];
		include('konek2.php');
		$sql = mysql_query("update stokobat set nama='$nama', jenis='$jenis', produsen='$produsen', banyak='$banyak', kadaluarsa='$kadaluarsa', keterangan='$keterangan' where id='$id'");
		if ($sql === TRUE) {
			echo"<script>alert('berhasil edit data');history.go(-2);</script>";
		} else {
			echo"<script>alert('gagal edit data');history.go(-2);</script>";
		}
		mysql_close($connection); 
	}
?>