<?php

$server = "localhost";
$user = "root";
$password = "";
$db_name = "icai2019";
$conn = mysqli_connect($server, $user, $password, $db_name);
//$db = $conn;

if(!$conn){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>