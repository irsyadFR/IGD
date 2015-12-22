
<div>
<h1><a href="index.php">IGD</a></h1>
	<nav id="nav">
		<ul>
			<li><a href="index.php"><i class="fa fa-user"></i>
						<?php 
						if(isset($_SESSION['login_user'])){
							echo $_SESSION['login_user'];
						}  else  {
							echo "";
						}
						 ?></a></li>
			<li><a href="index.php">Home</a></li>
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