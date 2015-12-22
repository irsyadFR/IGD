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
						<h2>Tambah Jadwal Jaga Dokter</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<!-- Lists -->
					<section>
						<table class="table">
								<form method="post" action="">
									<tr>
                                    	<td>Id Dokter</td>
                                    	<td><input type="text" name="Id" id="Id" placeholder=" " />
                                	</tr>
                                	<tr>
                                    	<td>Nama Dokter</td>
                                    	<td><input type="text" name="namaDokter" id="namaDokter" value="" placeholder=" " />
                                	</tr>
                                	<tr>
                                    	<td>Nomor Telpon</td>
                                    	<td><input type="text" name="noTelp" id="noTelp" value="" placeholder=" " maxlength="13"/>
                                	</tr>
                                	<tr>
                                    	<td>Hari Jaga</td>
                                    	<td><div class="6u$ 12u$(4)">
											<select name="hariJaga">  
											<option value="">-Pilih hari jaga-</option>  
											<option value="Senin">Senin</option>  
											<option value="Selasa">Selasa</option>  
											<option value="Rabu">Rabu</option>  
											<option value="Kamis">Kamis</option>
											<option value="Jumat">Jumat</option>  
											<option value="Sabtu">Sabtu</option>
											<option value="Minggu">Minggu</option>
											</select>
										</div>
										</td>
                                	</tr>
                                	<tr>
                                    	<td>Waktu Jaga</td>
                                    	<td><div class="6u$ 12u$(4)">
											<select name="waktuJaga">  
											<option value="">-Pilih waktu jaga-</option>  
											<option value="08:00-14:00">08:00-14:00</option>  
											<option value="14:00-20:00">14:00-20:00</option>  
											<option value="20:00-08:00">20:00-08:00</option>  
											</select>
										</div>
										</td>
                                	</tr>
                                	<tr>
                                    	<td></td><td><input type="submit" name="submit" value="submit" class="special" /></td>
                                	</tr>
									</div>
								</form>
								<?php
							        if (isset($_POST['submit'])) {
							        	if (empty($_POST['Id']) || empty($_POST['namaDokter']) || empty($_POST['noTelp']) || empty($_POST['hariJaga']) || empty($_POST['waktuJaga'])) {
								        	echo"<script>alert('Ada konten yang kosong');history.go(-1);</script>";
								        } else {
								        	$Id=$_POST['Id'];
									        $namaDokter=$_POST['namaDokter'];
									        $noTelp=$_POST['noTelp'];
									        $hariJaga=$_POST['hariJaga'];
									        $waktuJaga=$_POST['waktuJaga'];
									        include('konek2.php');
									        
								        	$sql = mysql_query("insert into jadwaljagadokter (Id,namaDokter,noTelpon,hariJaga,waktuJaga) 
								        	values ('$Id','$namaDokter','$noTelp','$hariJaga','$waktuJaga')");
								        	if ($sql === TRUE) 							          {
								            	echo"<script>alert('Sukses mengisi jadwal jaga dokter');history.go(-1);</script>";
								        	} else {
								          		echo"<script>alert('gagal mengisi jadwal jaga dokter');history.go(-1);</script>";
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