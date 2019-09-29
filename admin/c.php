<?php

$un = $_POST['un'];
$pw = $_POST['pw'];

if ($un == "admin" && $pw == "admin") 
{
	echo "berhasil";
	 header('Location: ../admin.php');
}
else 
{
	echo "gagal";
	header('Location: ../admin/login.html');
}



?>