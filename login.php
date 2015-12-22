
<?php
	include('loginEngine.php');
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
					include "pecah/headerTop.php";
				?>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
					<header class="major">
						<h2>LOGIN</h2>
						<p>RS DR OEN Surakarta</p>
					</header>
					<!-- Lists -->
					<section>
						<div class="row">
							<div class="6u 12u(3)">
								<h4>LOGIN</h4>
								<form method="post" action="">
									<div class="row uniform 50%">
										<div class="6u 12u$(4)">
											<input type="text" name="username" id="username" placeholder="Username" />
										</div> <br/><br/><br/>
										<div class="6u$ 12u$(4)">
											<input type="password" name="password" id="password" value="" placeholder="Password" />
										</div>
										<div class="6u$ 12u$(4)">
											<select name="kategori">  
											<option value="">Kategori</option>  
											<option value="admin">Admin</option>  
											<option value="dokter">Dokter</option>  
											</select>
										</div>
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" name="submit" value="Login" class="special" /></li>
											</ul>
										</div>
										<span><?php echo $error; ?></span>
									</div>
								</form> 
							</div>
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