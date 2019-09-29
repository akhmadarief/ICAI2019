<?php

header("Refresh:1; url=index.html");

$id = $_POST['id'];
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
$reg_type = $_POST['reg_type'];
$no_mai = $_POST['no_mai'];
$price = $_POST['price'];

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
    $sql = "INSERT INTO register (id, full_name, degree, inst, email, no_phone, no_mobile, st_address, city, region, zip, country, status, reg_type, no_mai, price)   
  values ('$id','$full_name','$degree','$inst','$email','$no_phone','$no_mobile','$st_address','$city','$region','$zip','$country','$status','$reg_type','$no_mai','$price')";  //ini utama
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

/*
if (!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "yo";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $username, $password, $gender, $email, $phoneCode, $phone);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
*/
echo "<head>
<script>

window.onload = function() {
  window.open('cetak_cari.php?id=$id', '_blank');
}
</script>
</head>";
echo "yooo";
$referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

if (!empty($referer)) {
  
  echo '<p><a href="'. $referer .'" title="Return to the previous page">&laquo; Go back</a></p>';
  
} else {
  
  echo '<p><a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a></p>';
  
}

?>