<?php
								$error=''; 
								if (isset($_POST['submit7'])) {
									$error='';
									$Id=$_POST['Id'];
									$namaDokter=$_POST['namaDokter'];
									$noTelpon=$_POST['noTelpon'];
									$hariJaga=$_POST['hariJaga'];
									$waktuJaga=$_POST['waktuJaga'];
									include('konek2.php');
									$sql3 = mysql_query("update jadwaljagadokter set noTelpon='$noTelpon', hariJaga='$hariJaga', waktuJaga='$waktuJaga' where Id='$Id'");
									if ($sql3 === TRUE) {
										//$error = "berhasil";
										//alert('apdet sukses');
										// echo "window.alert('Nama belum diisi');";
										echo"<script>alert('berhasil edit data');history.go(-2);</script>";
										//header("location: editJadwalJagaDokter.php");
									} else {
									    echo"<script>alert('gagal edit data');history.go(-2);</script>";
									}
									mysql_close($connection); 
								}
							?>