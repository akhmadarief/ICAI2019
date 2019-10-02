<?php

header("Refresh:2; url=admin.php");
include("conf.php");

$id = $_POST['id'];
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

$type_reg = $_POST['type_reg'];
$query = mysqli_query($conn, "SELECT * FROM jenis where type_reg='$type_reg'");
$row = mysqli_fetch_array($query);

$reg_type = $row['regist_type'];
$price = $row['price'];

$sql = "UPDATE register SET full_name='$full_name', degree='$degree', inst='$inst', email='$email', no_phone='$no_phone', no_mobile='$no_mobile', st_address='$st_address', city='$city', region='$region', zip='$zip', country='$country', status='$status', reg_type='$reg_type', no_mai='$no_mai', price='$price' WHERE id='$id'";

if ($conn->query($sql)){
	echo "New record is updated sucessfully";
}
else{
	echo "Error: ". $sql ."
	". $conn->error;
}

$conn->close();

echo " yooo";

?>