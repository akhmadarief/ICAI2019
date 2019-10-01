<?php

header("Refresh:1; url=index.php");

$no_mai = $_POST['no_mai'];
//$id = $_POST['id'];
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
//$reg_type = $_POST['reg_type'];
$no_mai = $_POST['no_mai'];
//$price = $_POST['price'];
$reg_id = $_POST['type_reg'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "yo";
    //create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()) {
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} 

else {
     //$SELECT = "SELECT email From register Where email = ? Limit 1";
  if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
  }

  else {

    $sql = "SELECT * 
    FROM jenis where type_reg='$reg_type'";

    $query = mysqli_query($conn, $sql);

    if (!$query) {
      die ('SQL Error: ' . mysqli_error($conn));
    }

    $row = mysqli_fetch_array($query);
    $reg_type = $row['regist_type'];
    echo $reg_type;
    $price = $row['price'];
    echo $price;


	$sql = "INSERT INTO register (full_name, degree, inst, email, no_phone, no_mobile, st_address, city, region, zip, country, status, reg_type, no_mai, price)   
	values ('$full_name','$degree','$inst','$email','$no_phone','$no_mobile','$st_address','$city','$region','$zip','$country','$status','$reg_type','$no_mai','$price')";  //ini utama
	$sql1 = "SELECT * FROM register";

  if ($conn->query($sql)){
    echo "New record is inserted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
    ". $conn->error;
  }
  $conn->close();
}
}

echo "yooo";
$referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

if (!empty($referer)) {
  
  echo '<p><a href="'. $referer .'" title="Return to the previous page">&laquo; Go back</a></p>';
  
} else {
  
  echo '<p><a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a></p>';
  
}

?>