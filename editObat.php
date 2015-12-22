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
						<h2>EDIT OBAT</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<section class="profiles">
						
		                    <table class ="alt">
		                    <tbody>
		                        <tr>
		                            <th><center>NO</th></center>
		                            <th><center>ID</th></center>
		                            <th><center>NAMA</th></center>
		                            <th><center>JENIS</th></center>
		                            <th><center>PRODUSEN</th></center>
		                            <th><center>BANYAK</th></center>
		                            <th><center>KADALUARSA</th></center>
		                            <th><center>KETERANGAN</th></center>
		                        </tr>       
                    <?php
                        $sql="select id, Nama, jenis, produsen, banyak, kadaluarsa, keterangan from stokObat";
                        $hasil = $conn->query( $sql );
                        $no=1;     
                        if( $hasil->num_rows>0 ) {                                 //membuat nomor pada tabel
	                        while($row = $hasil->fetch_assoc()){        //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
                    ?>      
		                        <tr class="active">
		                            <td><?php echo $no++; ?></td>
		                            <td><?php echo $row['id'] ?></td>
		                            <td><?php echo $row['Nama'] ?></td>
		                            <td><?php echo $row['jenis'] ?></td>
		                            <td><?php echo $row['produsen'] ?></td>
		                            <td><?php echo $row['banyak'] ?></td>
		                            <td><?php echo $row['kadaluarsa'] ?></td>
		                            <td><?php echo $row['keterangan'] ?></td>
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
												<input type="text" name="id" id="id" placeholder="Id Obat" />
											</div> <br/><br/><br/>
											<div class="6u 12u$(4)" align="left">
												<ul class="actions">
													<li><input type="submit" name="submit20" value="Search" class="special"/></li>
												</ul>
											</div>
											<span><?php echo $error; ?></span>
										</div>
									</form> 
								</div>

		                    <?php
	                            if (isset($_POST['submit20'])) {
	                            	if (empty($_POST['id'])) {
	                            		echo"<script>alert('inputan kosong');history.go(-1);</script>";
									} else {
	                            		$id=$_POST['id'];
	                            		include('konek2.php');
										$sql2 = mysql_query("select id, nama, jenis, produsen, banyak, kadaluarsa, keterangan from stokobat where Id='$id'", $connection);
								        //$hasil2 = mysql_query( $sql2, $connection );
	                            		$rows = mysql_num_rows($sql2);
								        //$result = mysql_query( $sql2, $connection );
										if ($rows == 1) {          
											while($row = mysql_fetch_assoc($sql2)){
										?>

										
										
						                        <table class="table">
						                            <form method="post" action="StokObatEngine.php">
						                            	<tr>
						                                    <td>Id</td>
						                                    <td><input type="text" value="<?php echo $row['id'] ?>" name="id"></td>
						                                </tr>
						                                <tr>
						                                    <td>Nama Obat</td>
						                                    <td><input type="text" value="<?php echo $row['nama'] ?>" name="nama"></td>
						                                </tr>
						                                <tr>
						                                    <td>Jenis Obat</td>
						                                    <td><input type="text" name="jenis" value="<?php echo $row['jenis'] ?>"></td>
						                                </tr>
						                                <tr>
						                                    <td>Produsen Obat</td>
						                                    <td><input type="text" name="produsen" value="<?php echo $row['produsen'] ?>"></td>
						                                </tr>
						                                <tr>
						                                    <td>Banyak Obat</td>
						                                    <td><input type="text" name="banyak" value="<?php echo $row['banyak'] ?>"></td>
						                                </tr>
						                                <tr>
						                                    <td>Kadaluarsa</td>
						                                    <td><input type="date" name="kadaluarsa" align="left" value="<?php echo $row['kadaluarsa'] ?>"></td>
						                                </tr>
						                                <tr>
						                                    <td>Keterangan</td>
						                                    <td><input type="text" name="keterangan" value="<?php echo $row['keterangan'] ?>"></td>
						                                </tr>

						                                <tr>
						                                    <td><input type="submit" name="submit21" value="update"></td>
						                                </tr>
						                            </form>
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