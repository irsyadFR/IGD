
<?php 
include('loginEngine.php');
?>
<div>
<h1><a href="halamanDokter.php">IGD</a></h1>
	<nav id="nav">
		<ul>
			<li><a href="halamanDokter.php"><i class="fa fa-user"></i>
						<?php 
						if(isset($_SESSION['login_user'])){
							echo $_SESSION['login_user'];
						}  else  {
							echo "";
						}
						 ?></a></li>
			<li><a href="stokObatDokter.php">
				<?php 
					if(isset($_SESSION['login_user'])){
						echo "Stok Obat";
					}  else  {
						echo "";
					}
				?>	
			</a></li>
			<li><a href="rekamMedisSearch.php">
				<?php 
					if(isset($_SESSION['login_user'])){
						echo "Rekam Medis";
					}  else  {
						echo "";
					}
				?>	
			</a></li>
			<li><a href="logout.php" class="button special">
				<?php 
					if(isset($_SESSION['login_user'])){
						echo "Log Out";
					}  else  {
						echo "Login";
					}
				?>	
			</a></li>

		</ul>
</nav>
</div>