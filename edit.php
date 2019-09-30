<?php 

include("conf.php");

if( !isset($_GET['id']) ){
	// kalau tidak ada id di query string
	header('Location: admin.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$query = mysqli_query($db, "SELECT * FROM register WHERE id='$id'");
$peserta = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
//if( mysqli_num_rows($query) < 1 ){
//	die("data tidak ditemukan...");
//}

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
    <title>ICAI 2019 - Edit</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/icai-fan.png"/>

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
    
    <script>
       function confirm_reset() {
          return confirm("Are you sure you want to reset all text?");
      }
      
      function konfirmasi() {
          var txt;
          var r = confirm("Pastikan data sudah benar");
          if (r == true) {
             txt = "You pressed OK!";
         } else {
             event.preventDefault();
         }
     }
 </script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    body  {
        background: url("images/bg.jpg");
        background-repeat: no-repeat;
        background-size: auto;
        background-color: #cccccc;
        background-attachment: fixed;
    }
</style>
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
                    <a class="navbar-brand" ><img src="images/logos/logoicai.png" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="active" href="admin.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="parallax first-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow slideInLeft hidden-xs hidden-sm">
                    <div class="contact_form">
                        <h3><i class="fa fa-envelope-o grd1 global-radius"></i> EDIT FORM </h3>
                        <form id="update" class="row" name="update" action="update.php" method="post">
                            <fieldset class="row-fluid">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="hidden" name="id" required id="id" value="<?php echo $peserta['id']?>" class="form-control" placeholder="ID">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="full_name" required id="full_name" value="<?php echo $peserta['full_name']?>" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="degree" required id="degree" value="<?php echo $peserta['degree']?>" class="form-control" placeholder="Degree">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="inst" required id="inst" value="<?php echo $peserta['inst']?>" class="form-control" placeholder="Institution">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="email" required id="email" value="<?php echo $peserta['email']?>" class="form-control" placeholder="Mailing Address">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="no_phone" required id="no_phone" value="<?php echo $peserta['no_phone']?>" class="form-control" placeholder="Phone">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="no_mobile" required id="no_mobile" value="<?php echo $peserta['no_mobile']?>" class="form-control" placeholder="Mobile">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="st_address" required id="st_address" value="<?php echo $peserta['st_address']?>" class="form-control" placeholder="Street Address">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="city" required id="city" value="<?php echo $peserta['city']?>" class="form-control" placeholder="City">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="region" required id="region" value="<?php echo $peserta['region']?>" class="form-control" placeholder="State/Province/Region">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="zip" required id="zip" value="<?php echo $peserta['zip']?>" class="form-control" placeholder="Postal/Zip Code">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="country" required id="country" value="<?php echo $peserta['country']?>" class="form-control" placeholder="Country">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="status" required id="status" value="<?php echo $peserta['status']?>" class="form-control" placeholder="Status">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="reg_type" required id="reg_type" value="<?php echo $peserta['reg_type']?>" class="form-control" placeholder="Registration Type">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="no_mai" required id="no_mai" value="<?php echo $peserta['no_mai']?>" class="form-control" placeholder="No. Anggota MAI">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="price" required id="price" value="<?php echo $peserta['price']?>" class="form-control" placeholder="Biaya">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" value="update" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Update</button>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="reset" value="reset" id="reset" class="btn btn-light btn-radius btn-brd grd1 btn-block">Reset</button>
                                </div>
                            </fieldset>
                        </form>
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