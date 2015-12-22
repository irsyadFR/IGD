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

			<section id="tambahStokObat" class="wrapper">
				<div class="container">
					<header class="major">
						<h2>Tambah Obat</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<section>
						<table class="table">
								<form method="post" action="">
									<tr>
                                    	<td>Id Obat</td>
                                    	<td><input type="text" name="id" id="id" placeholder=" "/>
                                	</tr>
                                	<tr>
                                    	<td>Nama Obat</td>
                                    	<td><input type="text" name="nama" id="nama" value="" placeholder=" " />
                                	</tr>
                                	<tr>
                                    	<td>Jenis Obat</td>
                                    	<td><input type="text" name="jenis" id="jenis" value="" placeholder=" " />
                                	</tr>
                                	<tr>
                                    	<td>Produsen Obat</td>
                                    	<td><input type="text" name="produsen" id="produsen" value="" placeholder=" " />
                                	</tr>
                                	<tr>
                                    	<td>Banyak Stok Obat</td>
                                    	<td><input type="text" name="banyak" id="banyak" value="" placeholder=" " />
                                	</tr>
                                	<tr>
                                    	<td>Tanggal Kadaluarsa</td>
                                    	<td><input type="date" name="kadaluarsa" id="kadaluarsa" value="" placeholder=" " />
                                	</tr>
                                	<tr>
                                    	<td>Keterangan</td>
                                    	<td><input type="text" name="keterangan" id="keterangan" value="" placeholder=" " />
                                	</tr>
                                	<tr>
                                    	<td></td><td><input type="submit" name="submit11" value="submit" class="special" /></td>
                                	</tr>
									<span><?php echo $error; ?></span>
								</form>
								<?php
							        if (isset($_POST['submit11'])) {
							        	$id=$_POST['id'];
								        $nama=$_POST['nama'];
								        $jenis=$_POST['jenis'];
								        $produsen=$_POST['produsen'];
								        $banyak=$_POST['banyak'];
								        $kadaluarsa=$_POST['kadaluarsa'];
								        $keterangan=$_POST['keterangan'];
								        $connection = mysql_connect("localhost", "root", "");
								        $db = mysql_select_db("igd", $connection);
								        $sql = mysql_query("insert into stokobat values ('$id','$nama','$jenis','$produsen','$banyak','$kadaluarsa','$keterangan')");
								        if ($sql === TRUE) 							          {
								            echo"<script>alert('Sukses menambah stok obat');history.go(-1);</script>";
								        } else {
								          echo"<script>alert('gagal menambah stok obat');history.go(-1);</script>";
								        }
								          mysql_close($connection);
								    } 
						    	?>
						</table>	
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