<?php
	session_start();
	if(!isset($_SESSION['login_user'])){
		echo"<script>alert('hanya admin yang boleh mengakses halaman ini');history.go(-1);</script>";

	} else {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sistem Informasi IGD RS Dr Oen</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>

		<!-- Header -->
			<header id="header" style="position: fixed;">
				<?php
					include "pecah/headerTopAdmin.php";
				?>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major">
						<h2>ISI IDENTITAS PASIEN</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<!-- Lists -->
					<section>
						<table class="table">
							<form method="post" action="">
								<tr>
                                    <td>Id Pasien</td>
                                    <td><input type="text" name="Id" id="Id" placeholder=" "/>
                                </tr>
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td><input type="text" name="namaPasien" id="namaPasien" value="" placeholder=" " />
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td><input type="text" name="tempatLahir" id="tempatLahir" value="" placeholder=" " />
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td><input type="date" name="tanggalLahir" id="tanggalLahir" value="" placeholder=" " />
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" name="alamat" id="alamat" value="" placeholder=" " />
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><div class="6u$ 12u$(4)">
											<select name="jenisKelamin">  
											<option value="">-Pilih Jenis Kelamin-</option>  
											<option value="Laki Laki">Laki-Laki</option>  
											<option value="Perempuan">Perempuan</option>  
											</select>
										</div>
									</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td><div class="6u$ 12u$(4)">
											<select name="agama">  
											<option value="">-Pilih Agama-</option>  
											<option value="Islam">Islam</option>  
											<option value="Kristen">Kristen</option>  
											<option value="Katholik">Katholik</option>  
											<option value="Budha">Budha</option>  
											<option value="Hindu">Hindu</option>  
											<option value="Konghuchu">Konghuchu</option>  
											<option value="Lain-lain">Lain-lain</option>  
											</select>
										</div>
									</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td><input type="text" name="pekerjaan" id="pekerjaan" value="" placeholder=" " />
                                </tr>
                                <tr>
                                    <td>Golongan Darah</td>
                                    <td><div class="6u$ 12u$(4)">
											<select name="golonganDarah">  
											<option value="">-Pilih Golongan Darah-</option>  
											<option value="A">A</option>  
											<option value="B">B</option>  
											<option value="AB">AB</option>  
											<option value="O">O</option>  
											<option value="Belum tahu">Belum Tahu</option>
											</select>
										</div>
									</td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td><input type="text" name="umur" id="umur" value="" placeholder=" " />
                                </tr>
								<tr>
                                    <td></td><td><input type="submit" name="submit1" value="submit" class="special" /></td>
                                </tr>
										<span><?php echo $error; ?></span>
							</form>
								<?php
							        if (isset($_POST['submit1'])) {
								        $Id=$_POST['Id'];
								        $namaPasien=$_POST['namaPasien'];
								        $tempatLahir=$_POST['tempatLahir'];
								        $tanggalLahir=$_POST['tanggalLahir'];
								        $alamat=$_POST['alamat'];
								        $jenisKelamin=$_POST['jenisKelamin'];
								        $agama=$_POST['agama'];
								        $pekerjaan=$_POST['pekerjaan'];
								        $golonganDarah=$_POST['golonganDarah'];
								        $umur=$_POST['umur'];
								        include('konek2.php');
								        $sql2 = mysql_query("select * from rekammedispasien where Id='$Id");
								        if ($sql2 == TRUE) {
								        	echo"<script>alert('Id sudah ada');history.go(-1);</script>";
								        } else {
								        	$sql = mysql_query("insert into rekammedispasien (Id,namaPasien,tempatLahir,tanggalLahir,alamat,jenisKelamin,agama,pekerjaan,golonganDarah,umur) 
								        	values ('$Id','$namaPasien','$tempatLahir','$tanggalLahir','$alamat','$jenisKelamin','$agama','$pekerjaan','$golonganDarah','$umur')");

									        if ($sql === TRUE) 							          {
									            echo"<script>alert('Sukses mengisi data pasien');history.go(-1);</script>";
									        } else {
									          echo"<script>alert('gagal mengisi data pasien');history.go(-1);</script>";
									        }
									        mysql_close($connection);
								        }
								    } 
						    	?>
						</table>	
					</section>
				</div>
			</section>
		<!-- Footer -->
		<footer id="footer">
			<?php
				include "pecah/footer.php";
			?>
		</footer>
	</body>
</html>

<?php
	}
?>