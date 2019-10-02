<?php

header("Refresh:2; url=index.php");
include("conf.php");

$no_mai = $_POST['no_mai'];
$full_name = $_POST['full_name'];
$degree = $_POST['degree'];
$inst = $_POST['inst'];
$email = $_POST['email'];
$no_phone = $_POST['no_phone'];
$no_mobile = $_POST['no_mobile'];
$st_address = $_POST['st_address'];
$city = $_POST['city'];
$region = $_POST['region'];
$zip = $_POST['zip'];
$country = $_POST['country'];
$status = $_POST['status'];
//$no_mai = $_POST['no_mai'];

$type_reg = $_POST['type_reg'];
$query = mysqli_query($conn, "SELECT * FROM jenis where type_reg='$type_reg'");
$row = mysqli_fetch_array($query);

$reg_type = $row['regist_type'];
$price = $row['price'];

$sql = "INSERT INTO register (full_name, degree, inst, email, no_phone, no_mobile, st_address, city, region, zip, country, status, reg_type, no_mai, price)   
values ('$full_name','$degree','$inst','$email','$no_phone','$no_mobile','$st_address','$city','$region','$zip','$country','$status','$reg_type','$no_mai','$price')";

if ($conn->query($sql)){
	echo "New record is inserted sucessfully";
}
else{
	echo "Error: ". $sql ."
	". $conn->error;
}

$conn->close();

echo " yooo";

?>