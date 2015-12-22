<?php
	include('loginEngine.php'); // Includes Login Script
?>
<div>
<h1><a href="halamanAdmin.php">IGD</a></h1>
	<nav id="nav">
		<ul>
			<li><a href="halamanAdmin.php"><i class="fa fa-user"></i>
						<?php 
						if(isset($_SESSION['login_user'])){
							echo $_SESSION['login_user'];
						}  else  {
							echo "";
						}
						 ?></a></li>
			<li><a href="editRuangIGD.php">
				<?php 
					if(isset($_SESSION['login_user'])){
						echo "Edit ruang IGD";
					}  else  {
						echo "";
					}
				?>	
			</a></li>	 
			<li><a href="editjadwalJagaDokter1.php">
				<?php 
					if(isset($_SESSION['login_user'])){
						echo "Edit Jadwal Jaga Dokter";
					}  else  {
						echo "";
					}
				?>	
			</a></li>
			<li><a href="stokObat.php">
				<?php 
					if(isset($_SESSION['login_user'])){
						echo "Stok Obat";
					}  else  {
						echo "";
					}
				?>	
			</a></li>
			<li><a href="isiIdentitasPasien.php">
				<?php 
					if(isset($_SESSION['login_user'])){
						echo "Identitas Pasien";
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