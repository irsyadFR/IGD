<?php
	include('rekamMedisSearchEngine.php');
	session_start();
	if(!isset($_SESSION['login_user'])){
		echo"<script>alert('hanya dokter yang boleh mengakses halaman ini');history.go(-1);</script>";
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
					include "pecah/headerTopDokter.php";
				?>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major">
						<h2>SEARCH PASIEN</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<!-- Lists -->
					<section>
						<div class="row">
							<div class="6u 12u(3)">
								<h4>SEARCH</h4>
								<form method="post" action="">
									<div class="row uniform 50%">
										<div class="6u$ 12u$(4)">
											<select name="kategori">  
												<option value="">Search by...</option>  
												<option value="Id">Id</option>  
												<option value="Nama">Nama</option>  
											</select>
										</div>

										<div class="6u 12u$(4)">
											<input type="text" name="Search" id="Search" placeholder="Search" />
										</div> <br/><br/><br/>
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" name="kirim11" value="Search" class="special" /></li>
											</ul>
										</div>
										<span><?php echo $error; ?></span>
									</div>
								</form> 
							</div>

							<?php
								$error=''; 
								if (isset($_POST['kirim11'])) {	//cek submit udh di klik blm
									if (empty($_POST['Search']) || empty($_POST['kategori'])) {
										echo"<script>alert('Ada data yang kosong');history.go(-1);</script>";
									} else {
										$Search=$_POST['Search'];
										$kategori = $_POST['kategori'];
											
										include('konek2.php');
										
										if ($kategori=="Id") {
											$query = mysql_query("select * from rekammedispasien where Id='$Search'", $connection);
											$rows = mysql_num_rows($query);

											if ($rows == 1) 
											{
												$error = "Data ada";
												$sql="select Id, namaPasien, namaWali, jenisKelamin, golonganDarah, umur, hasilAmnesis, kondisiPasien, waktuDatang, waktuPergi, diagnosa, tindakan from rekammedispasien where Id='$Search'";
												$Id=$Search;
											    $hasil = mysql_query( $sql, $connection );
											        // $Id = $_GET['Id'];
											        if(mysql_num_rows($hasil)>0 ) {             
											        	while($row = mysql_fetch_assoc($hasil)){
											        	?>  
							                        <table class="table">
							                            <form method="post" action="rekamMedisSearchEngine.php">
							                            	<tr>
							                                    <td>Id</td>
							                                    <td><input type="text" value="<?php echo $row['Id'] ?>" name="Id" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Nama Pasien</td>
							                                    <td><input type="text" value="<?php echo $row['namaPasien'] ?>" name="namaPasien" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Nama Wali</td>
							                                    <td><input type="text" name="namaWali" value="<?php echo $row['namaWali'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Jenis Kelamin</td>
							                                    <td><input type="text" name="jenisKelamin" value="<?php echo $row['jenisKelamin'] ?>" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Golongan Darah</td>
							                                    <td><input type="text" name="golonganDarah" value="<?php echo $row['golonganDarah'] ?>" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Umur</td>
							                                    <td><input type="text" name="umur" value="<?php echo $row['umur'] ?>" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Hasil Amnesis</td>
							                                    <td><input type="text" name="hasilAmnesis" value="<?php echo $row['hasilAmnesis'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Kondisi Pasien</td>
							                                    <td><input type="text" name="kondisiPasien" value="<?php echo $row['kondisiPasien'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Waktu Datang</td>
							                                    <td><input type="text" name="waktuDatang" value="<?php echo $row['waktuDatang'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Waktu Pergi</td>
							                                    <td><input type="text" name="waktuPergi" value="<?php echo $row['waktuPergi'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Diagnosa</td>
							                                    <td><input type="text" name="diagnosa" value="<?php echo $row['diagnosa'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Tindakan</td>
							                                    <td><input type="text" name="tindakan" value="<?php echo $row['tindakan'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td></td><td><input type="submit" name="submit19" value="update"></td>
							                                </tr>
							                            </form>
							                        </table>
							                        <?php
							                    }
							                }
											} else 
											{
												echo"<script>alert('Data tidak ada');history.go(-1);</script>";
											}
											mysql_close($connection);
										} else if ($kategori=="Nama") {
											$query = mysql_query("select * from rekammedispasien where namaPasien='$Search'", $connection);
											$rows = mysql_num_rows($query);

											if ($rows == 1) 
											{
												$error = "Data ada";
												$sql="select Id, namaPasien, namaWali, jenisKelamin, golonganDarah, umur, hasilAmnesis, kondisiPasien, waktuDatang, waktuPergi, diagnosa, tindakan from rekammedispasien where namaPasien='$Search'";
												$Id=$Search;
											        $hasil = mysql_query( $sql, $connection );
											        // $Id = $_GET['Id'];
											        if(mysql_num_rows($hasil)>0 ) {             
											        	while($row = mysql_fetch_assoc($hasil)){
											        	?>  
							                        <table class="table">
							                            <form method="post" action="rekamMedisSearchEngine.php">
							                            	<tr>
							                                    <td>Id</td>
							                                    <td><input type="text" value="<?php echo $row['Id'] ?>" name="Id" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Nama Pasien</td>
							                                    <td><input type="text" value="<?php echo $row['namaPasien'] ?>" name="namaPasien" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Nama Wali</td>
							                                    <td><input type="text" name="namaWali" value="<?php echo $row['namaWali'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Jenis Kelamin</td>
							                                    <td><input type="text" name="jenisKelamin" value="<?php echo $row['jenisKelamin'] ?>" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Golongan Darah</td>
							                                    <td><input type="text" name="golonganDarah" value="<?php echo $row['golonganDarah'] ?>" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Umur</td>
							                                    <td><input type="text" name="umur" value="<?php echo $row['umur'] ?>" class="field left" readonly></td>
							                                </tr>
							                                <tr>
							                                    <td>Hasil Amnesis</td>
							                                    <td><input type="text" name="hasilAmnesis" value="<?php echo $row['hasilAmnesis'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Kondisi Pasien</td>
							                                    <td><input type="text" name="kondisiPasien" value="<?php echo $row['kondisiPasien'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Waktu Datang</td>
							                                    <td><input type="text" name="waktuDatang" value="<?php echo $row['waktuDatang'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Waktu Pergi</td>
							                                    <td><input type="text" name="waktuPergi" value="<?php echo $row['waktuPergi'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Diagnosa</td>
							                                    <td><input type="text" name="diagnosa" value="<?php echo $row['diagnosa'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td>Tindakan</td>
							                                    <td><input type="text" name="tindakan" value="<?php echo $row['tindakan'] ?>"></td>
							                                </tr>
							                                <tr>
							                                    <td></td><td><input type="submit" name="submit19" value="update"></td>
							                                </tr>
							                            </form>
							                        </table>
							                        <?php
							                    }
							                }
											} else 
											{
												echo"<script>alert('Data tidak ada');history.go(-1);</script>";
											}
											mysql_close($connection);
										}
									}
								}
							?>

						</div>
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