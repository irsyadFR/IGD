<?php
    include('konek.php');
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

			<section id="main" class="wrapper">
				<div class="container">
					<header class="major">
						<h2>EDIT JADWAL JAGA DOKTER</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<section class="profiles">
						<div class="table-wrapper">
		                    <table class ="alt">
			                    <tbody>
			                        <tr>
			                            <th><center>ID</th></center>
			                            <th><center>NAMA DOKTER</th></center>
			                            <th><center>NO TELPON</th></center>
			                            <th><center>HARI JAGA</th></center>
			                            <th><center>WAKTU JAGA</th></center>
			                        </tr>       
	                        <?php
	                            $sql="select Id, namaDokter, noTelpon, hariJaga, waktuJaga from jadwaljagadokter";
	                            $hasil = $conn->query( $sql );
	                            $no=1;     
	                            if( $hasil->num_rows>0 ) {                                 //membuat nomor pada tabel
		                            while($row = $hasil->fetch_assoc()){        //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
                            ?>      
				                        <tr class="active">
				                            <td><?php echo $row['Id'] ?></td>
				                            <td><?php echo $row['namaDokter'] ?></td>
				                            <td><?php echo $row['noTelpon'] ?></td>
				                            <td><?php echo $row['hariJaga'] ?></td>
				                            <td><?php echo $row['waktuJaga'] ?></td>
				                        </tr>
	                        <?php
		                            }
		                        }
	                        ?>
			                    </tbody>
		                    </table>

		                    <div class="6u 12u(3)">
								<form method="post" action="">
									<div class="row uniform 50%">
										<div class="6u 12u$(4)">
											<input type="text" name="id" id="id" placeholder="Id dokter" />
										</div> <br/><br/><br/>
										<div class="6u 12u$(4)" align="left">
											<ul class="actions">
												<li><input type="submit" name="submit9" value="search" class="special"/></li>
											</ul>
										</div>
										<span><?php echo $error; ?></span>
									</div>
								</form> 
							</div>

							<?php
								$error='';
	                            if (isset($_POST['submit9'])) {
	                            	if (empty($_POST['id'])) {
										echo"<script>alert('inputan kosong');history.go(-1);</script>";
									} else {
	                            		$Id=$_POST['id'];
	                            		include('konek2.php');
										$sql2 = mysql_query("select Id, namaDokter, noTelpon, hariJaga, waktuJaga from jadwaljagadokter where Id='$Id'", $connection);
	                            		//$sql2="select Id, namaDokter, noTelpon, hariJaga, waktuJaga from jadwaljagadokter where Id='$Id'", $connection;
	                            		$rows = mysql_num_rows($sql2);
								        //$result = mysql_query( $sql2, $connection );
										if ($rows == 1) {          
											while($row = mysql_fetch_assoc($sql2)){
										?>
						                        <table class="table">
						                            <form method="post" action="editJadwalJagaDokterEngine.php">
						                            	<tr>
						                                    <td style="visibility:hidden;">Id</td>
						                                    <td style="visibility:hidden;"><input type="text" value="<?php echo $row['Id'] ?>" name="Id"></td>
						                                </tr>
						                                <tr>
						                                    <td>Nama Dokter</td>
						                                    <td><input type="text" value="<?php echo $row['namaDokter'] ?>" name="namaDokter"></td>
						                                </tr>
						                                <tr>
						                                    <td>No Telpon</td>
						                                    <td><input type="text" name="noTelpon" value="<?php echo $row['noTelpon'] ?>"></td>
						                                </tr>
						                                <tr>
						                                    <td>Hari Jaga</td>
					                                    	<td><div class="6u$ 12u$(4)">
																<select name="hariJaga">  
																<option value="">-<?php echo $row['hariJaga'] ?>-"</option>  
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
																<option value="">-<?php echo $row['waktuJaga'] ?>-</option>  
																<option value="08:00-14:00">08:00-14:00</option>  
																<option value="14:00-20:00">14:00-20:00</option>  
																<option value="20:00-08:00">20:00-08:00</option>  
																</select>
															</div>
															</td>
						                                </tr>
						                                <tr>
						                                    <td><input type="submit" name="submit7" value="update"></td>
						                                </tr>
						                            </form>	
						                            <span><?php echo $error; ?></span>				                            
						                        </table>
	                        <?php
	                    					}
					                    } else {
					                    	echo"<script>alert('Data tidak ada');history.go(-1);</script>";
					                    }
					                }
							    }
							?>
				                </div>
							</div>
						</div>
					</section>
				</div>
			</section>
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