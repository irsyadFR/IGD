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
				<h2>Sistem Informasi IGD</h2>
				<p>Rumah Sakit DR Oen</p>
				<ul class="actions">
					<li>
						<a href="#statusKetersediaanRuangIGD" class="smoothScroll button medium">Status Ketersediaan Ruang IGD</a>
						<a href="#jadwalRuangOperasi" class="smoothScroll button medium">Jadwal Ruang Operasi</a>
						<a href="#jadwalJagaDokter" class="smoothScroll button medium">Jadwal Jaga Dokter</a>
						<a href="#jadwalRuangRawatInap" class="smoothScroll button medium">Jadwal Ruang Rawat Inap</a>
					</li>
				</ul>
			</section>

		<!-- Two -->
			<section id="statusKetersediaanRuangIGD" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>STATUS KETERSEDIAAN RUANG IGD</h2>
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
							</div>
						</div>
					</section>
				</div>
			</section>


			<section id="jadwalRuangOperasi" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>JADWAL RUANG OPERASI</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<section class="profiles">
						<div class="table-wrapper">
		                    <table class ="alt">
			                    <tbody>
			                        <tr>
			                            <th>NO</th>
			                            <th>ID</th>
			                            <th>NAMA RUANG</th>
			                            <th>WAKTU</th>
			                            <th>KETERANGAN</th>
			                        </tr>       
		                        <?php
		                            $sql="select Id, namaRuang, waktuOperasi, keterangan from jadwalRuangOperasi";
		                            $hasil = $conn->query( $sql );
		                            $no=1;     
		                            if( $hasil->num_rows>0 ) {                                 //membuat nomor pada tabel
			                            while($row = $hasil->fetch_assoc()){        //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
	                            ?>      
				                        <tr class="active">
				                            <td><?php echo $no++; ?></td>
				                            <td><?php echo $row['Id'] ?></td>
				                            <td><?php echo $row['namaRuang'] ?></td>
				                            <td><?php echo $row['waktuOperasi'] ?></td>
				                            <td><?php echo $row['keterangan'] ?></td>
				                        </tr>
		                        <?php
			                            }
			                        }
		                        ?>
				                    </tbody>
				                    </table>
				                </div>
							</div>
						</div>
					</section>
				</div>
			</section>

			<section id="jadwalJagaDokter" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>JADWAL JAGA DOKTER</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<section class="profiles">
						<div class="table-wrapper">
		                    <table class ="alt">
			                    <tbody>
			                        <tr>
			                            <th>NO</th>
			                            <th>ID</th>
			                            <th>NAMA</th>
			                            <th>NO TELPON</th>
			                            <th>HARI</th>
			                            <th>WAKTU</th>
			                        </tr>       
		                        <?php
		                            $sql="select Id, namaDokter, noTelpon, hariJaga, waktuJaga from jadwalJagaDokter";
		                            $hasil = $conn->query( $sql );
		                            $no=1;                                      //membuat nomor pada tabel
		                            if( $hasil->num_rows>0 ) {
		                	            while($row = $hasil->fetch_assoc()){        //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
	                            ?>      
				                        <tr class="active">
				                            <td><?php echo $no++; ?></td>
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
			                </div>
					</section>
				</div>
			</section>		


			<section id="jadwalRuangRawatInap" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>JADWAL RUANG RAWAT INAP</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<section class="profiles">
						<div class="table-wrapper">
		                    <table class ="alt">
			                    <tbody>
			                        <tr>
			                            <th>NO</th>
			                            <th>ID</th>
			                            <th>NAMA RUANG</th>
			                            <th>KELAS</th>
			                            <th>NO RUANG</th>
			                            <th>JUMLAH BED</th>
			                            <th>JUMLAH PASIEN</th>
			                            <th>MASUK</th>
			                            <th>KELUAR</th>
			                            <th>KETERANGAN</th>
			                        </tr>       
		                        <?php
		                            $sql="select Id, namaRuang, noRuang, kelas, jumlahBed, jumlahPasien, waktuMasuk, waktuKeluar, keterangan from ketersediaanRawatInap";
		                            $hasil = $conn->query( $sql );
		                            $no=1;                                      //membuat nomor pada tabel
		                            if( $hasil->num_rows>0 ) {
			                            while($row = $hasil->fetch_assoc()){        //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
	                            ?>      
				                        <tr class="active">
				                            <td><?php echo $no++; ?></td>
				                            <td><?php echo $row['Id'] ?></td>
				                            <td><?php echo $row['namaRuang'] ?></td>
				                            <td><?php echo $row['noRuang'] ?></td>
				                            <td><?php echo $row['kelas'] ?></td>
				                            <td><?php echo $row['jumlahBed'] ?></td>
				                            <td><?php echo $row['jumlahPasien'] ?></td>
				                            <td><?php echo $row['waktuMasuk'] ?></td>
				                            <td><?php echo $row['waktuKeluar'] ?></td>
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

<?php
	}
?>