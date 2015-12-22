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

			<section class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>HAPUS JADWAL JAGA DOKTER</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<section class="profiles">
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
	                            $sql="select id, namaDokter, noTelpon, hariJaga, waktuJaga from jadwaljagadokter";
	                            $hasil = $conn->query( $sql );
	                            $no=1;     
	                            if( $hasil->num_rows>0 ) {                                 //membuat nomor pada tabel
		                            while($row = $hasil->fetch_assoc()){        //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
                            ?>      
			                        <tr class="active">
			                            <td><?php echo $row['id'] ?></td>
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
											<li><input type="submit" name="submit10" value="hapus" class="special" align:'left'/></li>
										</ul>
									</div>
									<span><?php echo $error; ?></span>
								</div>
							</form> 
						</div>

						<?php
                            if (isset($_POST['submit10'])) {
                            	if (empty($_POST['id'])) {
									echo"<script>alert('id dokter kosong');history.go(-1);</script>";
								} else {
                           			$Id=$_POST['id'];
						        	$connection = mysql_connect("localhost", "root", "");
							        $db = mysql_select_db("igd", $connection);
							        $sql = mysql_query("delete from jadwaljagadokter where Id='$Id'");
							        if ($sql === TRUE) {
							            echo"<script>alert('Sukses hapus data');history.go(-1);</script>";
							        } else {
								        echo"<script>alert('gagal hapus data');history.go(-1);</script>";
							        }
							        mysql_close($connection); 
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