<?php
	
	$error=''; 
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['kategori'])) {
			$error = "Username or Password is invalid";
		} else {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$kategori = $_POST['kategori'];
				
			include('konek2.php');
			
			if ($kategori=="admin") {
				$query = mysql_query("select * from admin where Password='$password' AND Username='$username'", $connection);
				$rows = mysql_num_rows($query);
				if ($rows == 1) 
				{
					session_start(); 
					$_SESSION['login_user']=$username; 
					header("location: halamanAdmin.php");
				} else 
				{
					$error = "Username or Password is invalid";
				}
				mysql_close($connection);
			} else if ($kategori=="dokter") {
				$query = mysql_query("select * from dokter where Password='$password' AND Id='$username'", $connection);
				$rows = mysql_num_rows($query);
				if ($rows == 1) 
				{
					session_start();
					$_SESSION['login_user']=$username; 
					header("location: halamanDokter.php");
				} else 
				{
					$error = "Username or Password is invalid";
				}
				mysql_close($connection);
			}
		}
	}
?>
