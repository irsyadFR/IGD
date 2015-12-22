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
				<h2>Obat</h2>
				<p>Rumah Sakit DR Oen</p>
				<ul class="actions">
					<li>
						<a href="editObat.php" class="smoothScroll button medium">Edit Obat</a>
						<a href="tambahObat.php" class="smoothScroll button medium">Tambah Obat</a>
						<a href="#tampilkanObat" class="smoothScroll button medium">Obat</a>
					</li>
				</ul>
			</section>

			<section id="tampilkanObat" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>OBAT</h2>
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