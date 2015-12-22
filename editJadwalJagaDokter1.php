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

		<!-- Banner -->
			<section id="banner">
				<h2>JADWAL JAGA DOKTER</h2>
				<p>Rumah Sakit DR Oen</p>
				<ul class="actions">
					<li>
						<a href="tambahJadwalJagaDokter.php" class="smoothScroll button medium">Tambah jadwal jaga</a>
						<a href="editJadwalJagaDokter.php" class="smoothScroll button medium">Edit jadwal jaga</a>
						<a href="hapusJadwalJagaDokter.php" class="smoothScroll button medium">Hapus jadwal jaga</a>
					</li>
				</ul>
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