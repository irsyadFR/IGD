<?php
    include('konek.php');
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
					include "pecah/headerTop.php";
				?>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2>Sistem Informasi IGD</h2>
				<p>Rumah Sakit DR Oen</p>
				<ul class="actions">
					<li>
						<a href="#ketersediaanRuang" class="smoothScroll button medium">Ketersediaan ruang IGD</a>
					</li>
				</ul>
			</section>

			<section id="ketersediaanRuang" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>KETERSEDIAAN RUANG IGD</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<section class="profiles">
						<div class="table-wrapper">
		                    <table class ="alt">
			                    <tbody>
			                        <tr>
			                            <th><center>TOTAL IGD</th></center>
			                            <th><center>JUMLAH PASIEN</th></center>
			                            <th><center>KETERANGAN</th></center>
			                        </tr>       
		                        <?php
		                            $sql="select totalIGD, jumlahPasien, keterangan from ketersediaanIGD";
		                            $hasil = $conn->query( $sql );
		                            $no=1;     
		                            if( $hasil->num_rows>0 ) {                                 //membuat nomor pada tabel
			                            while($row = $hasil->fetch_assoc()){        //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
	                            ?>      
				                        <tr class="active">
				                            <td><?php echo $row['totalIGD'] ?></td>
				                            <td><?php echo $row['jumlahPasien'] ?></td>
				                            <td><?php echo $row['keterangan'] ?></td>
				                        </tr>
		                        <?php
			                            }
			                        }
		                        ?>
			                    </tbody>
		                    </table>
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