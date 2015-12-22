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

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major">
						<h2>EDIT RUANG IGD</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<!-- Lists -->
					<section class="profiles">
			<?php                   
                $sql="select Id, totalIGD, jumlahPasien, keterangan from ketersediaanigd where Id='1'";
			    $hasil = $conn->query( $sql );
			    if( $hasil->num_rows>0 ) {                                 //membuat nomor pada tabel
			        while($row = $hasil->fetch_assoc()){        //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
			?>  
                        <table class="table">
                            <form method="post" action="">
                            	<tr>
                                    <td style="visibility:hidden;">Id</td>
                                    <td style="visibility:hidden;"><input type="text" value="<?php echo $row['Id'] ?>" name="Id"></td>
                                </tr>
                                <tr>
                                    <td>total IGD</td>
                                    <td><input type="text" value="<?php echo $row['totalIGD'] ?>" name="totalIGD"></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Pasien</td>
                                    <td><input type="text" name="jumlahPasien" value="<?php echo $row['jumlahPasien'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td><input type="text" name="keterangan" value="<?php echo $row['keterangan'] ?>"></td>
                                </tr>
                                <tr>
                                    <td></td><td><input type="submit" name="submit5" value="update"></td>
                                </tr>
                            </form>
                            <?php
                            	if (isset($_POST['submit5'])) {
                            		$Id=$_POST['Id'];
							        $totalIGD=$_POST['totalIGD'];
							        $jumlahPasien=$_POST['jumlahPasien'];
							        $keterangan=$_POST['keterangan'];
							        include('konek2.php');
							        $sql = mysql_query("update ketersediaanigd set totalIGD='$totalIGD', jumlahPasien='$jumlahPasien', keterangan='$keterangan' where Id='$Id'");
							        if ($sql === TRUE) {
							            echo"<script>alert('Sukses edit data');history.go(-1);</script>";
							        } else {
								        echo"<script>alert('gagal edit data');history.go(-1);</script>";
							        }
							        mysql_close($connection); 
							    }
							?>
                        </table>
                        <?php
                    }
                }
            ?>
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