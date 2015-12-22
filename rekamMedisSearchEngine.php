<?php
	$error=''; 
	if (isset($_POST['submit19'])) {
		$Id=$_POST['Id'];
		$namaPasien=$_POST['namaPasien'];
		$namaWali=$_POST['namaWali'];
		$jenisKelamin=$_POST['jenisKelamin'];
		$golonganDarah=$_POST['golonganDarah'];
		$umur=$_POST['umur'];
		$hasilAmnesis=$_POST['hasilAmnesis'];
		$kondisiPasien=$_POST['kondisiPasien'];
		$waktuDatang=$_POST['waktuDatang'];
		$waktuPergi=$_POST['waktuPergi'];
		$diagnosa=$_POST['diagnosa'];
		$tindakan=$_POST['tindakan'];
		include('konek2.php');
		$sql = mysql_query("update rekammedispasien set  namaPasien='$namaPasien', namaWali='$namaWali', jenisKelamin='$jenisKelamin', golonganDarah='$golonganDarah', umur='$umur', hasilAmnesis='$hasilAmnesis', kondisiPasien='$kondisiPasien', waktuDatang='$waktuDatang', waktuPergi='$waktuPergi', diagnosa='$diagnosa', tindakan='$tindakan' where Id='$Id'");
		if ($sql === TRUE) {
			echo"<script>alert('Berhasil update data');history.go(-2);</script>";
		} else {
		    echo"<script>alert('gagal edit data');history.go(-1);</script>";
		}
		mysql_close($connection); 
	}
?>