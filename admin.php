<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'yo'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * 
		FROM register';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>ICAI 2019 - Admin</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="css/colors.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="realestate_version">

    <!-- LOADER -->
    <div id="preloader">
        <span class="loader"><span class="loader-inner"></span></span>
    </div><!-- end loader -->
    <!-- END LOADER -->

    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html"><img src="images/logos/logoicai.png" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Offline Form</a></li>
                            <li>Admin</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </nav>
    </header>


            
	<div id="support" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Request for Contact</h3>
                <p class="lead">Let us give you more details about the special offer website you want us. Please fill out the form below. <br>We have million of website owners who happy to work with us!</p>
            </div><!-- end title -->
            <div class="row">
              <div class="container-table100">
                <div class="table-responsive">
                  <div class="wrap-table100">
                    <table class="table100">
                      <thead>
                        <tr class="table100-head">
                          <th scope="col">ID</th>
                          <th scope="col">Full Name</th>
                          <th scope="col">Degree</th>
                          <th scope="col">Institution</th>
                          <th scope="col">Mailing Address</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Mobile</th>
                          <th scope="col">Street Address</th>
                          <th scope="col">City</th>
                          <th scope="col">State/Province/Region</th>
                          <th scope="col">Postal/Zip Code</th>
                          <th scope="col">Country</th>
                          <th scope="col">Status</th>
                          <th scope="col">Registration Type</th>
                          <th scope="col">No. MAI</th>
                          <th scope="col">Total Cost</th>
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
					<tbody>
					<?php
					//$no 	= 1;
					while ($row = mysqli_fetch_array($query))
					{
						echo "<tr>
								<td>".$row['id']."</td>
								<td>".$row['full_name']."</td>
								<td>".$row['degree']."</td>
								<td>".$row['inst']."</td>
								<td>".$row['email']."</td>
								<td>".$row['no_phone']."</td>
								<td>".$row['no_mobile']."</td>
								<td>".$row['st_address']."</td>
								<td>".$row['city']."</td>
								<td>".$row['region']."</td>
								<td>".$row['zip']."</td>
								<td>".$row['country']."</td>
								<td>".$row['status']."</td>
								<td>".$row['reg_type']."</td>
								<td>".$row['no_mai']."</td>
								<td>".$row['price']."</td>
								<td><a href='edit.php?id=$row[id]'>Edit</a>
								<a href='cetak_cari.php?id=$row[id]'  target='_blank' rel='nofollow'>Cetak</a>
								</td>
							</tr>";
					//	$no++;
					}?>
					</tbody>
                    </table>       
                  </div>
                </div>
              </div>
            </div>
        </div> 
	</div>
        
    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>    
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
   <!-- MAP & CONTACT -->
    <script src="js/map.js"></script>

</body>
</html>