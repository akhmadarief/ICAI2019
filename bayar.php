<?php

include("conf.php");
$id = $_GET['id'];
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
  $sql = "UPDATE register SET bayar='Lunas' WHERE id='$id'";  //ini utama
  $sql1 = "SELECT * FROM register";

  if ($conn->query($sql)){
    //echo "New record is updated sucessfully";
    include 'cetak_inv.php';
    
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
/*
$referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

if (!empty($referer)) {
  
  echo '<p><a href="'. $referer .'" title="Return to the previous page">&laquo; Go back</a></p>';
  
} else {
  
  echo '<p><a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a></p>';
  
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
*/
?>