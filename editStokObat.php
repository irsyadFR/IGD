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
		<script type="text/javascript" src="js/smoothscroll.js"></script>
		<noscript>
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">

		<!-- Header -->
			<header id="header" style="position: fixed;">
				<?php
					include "pecah/headerTopAdmin.php";
				?>
			</header>

		<!-- Two -->
			<section id="DaftarAlumni" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>EDIT STOK OBAT</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<section class="profiles">

			<?php 
				$id = $_GET['id'];
				$query = mysql_query("select * from stokObat where id=$id");
					while ($q=mysql_fetch_array($query) or die(mysql_error())) {
					//while ($q = mysql_fetch_array($query)) {
			?>
					    <table>
					        <form action="updateStokObat.php" method="post">
					            <tr>
					                <td>Nama</td>
					                <td><input type="text" value="<?php echo $q['nama'] ?>" name="nama"></td>
					            </tr>
					            <tr>
					                <td>Jenis</td>
					                <td><input type="text" name="jenis" value="<?php echo $q['jenis'] ?>"></td>
					            </tr>
					            <tr>
					                <td>Produsen</td>
					                <td><input type="text" name="produsen" value="<?php echo $q['produsen'] ?>"></td>
					            </tr>
					            <tr>
					                <td>Banyak</td>
					                <td><input type="integer" name="banyak" value="<?php echo $q['banyak'] ?>"></td>
					            </tr>
					            <tr>
					                <td>Kadaluarsa</td>
					                <td><input type="integer" name="kadaluarsa" value="<?php echo $q['kadaluarsa'] ?>"></td>
					            </tr>
					            <tr>
					                <td>Keterangan</td>
					                <td><input type="integer" name="keterangan" value="<?php echo $q['angkatan_mhs'] ?>"></td>
					            </tr>

					            <tr>
					                
					            </tr>
					            <tr>
					                <td></td><td><input type="submit" value="update"></td>
					            </tr>
					        </form>
					    </table>
				<?php
					}
				?>


					</section>
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