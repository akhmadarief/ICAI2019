<?php

$server = "localhost";
$user = "root";
$password = "";
$db_name = "icai2019";
$db = mysqli_connect($server, $user, $password, $db_name);
	if( !isset($_GET['nomor_anggota']) ){
		error_reporting(0);
	}
else{
	//ambil id dari query string
	$nomor_anggota = $_GET['nomor_anggota'];
	$query = mysqli_query($db, "SELECT * FROM daftar_keanggotaan WHERE nomor_anggota='$nomor_anggota'");
	$member = mysqli_fetch_assoc($query);
	if($query->num_rows == 0){
		echo "<script>alert('No. Anggota MAI not found');</script>";
	}
	else{
		$status='Anggota';
	}
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
    <title>ICAI 2019 - Registration Form</title>
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
          document.getElementById("member_edit").reset();
          document.getElementById("member_reg").reset();
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
            </div>
        </nav>
    </header>

    <div class="parallax first-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow slideInLeft hidden-xs hidden-sm">
                    <div class="contact_form">
                        <h3><i class="fa fa-envelope-o grd1 global-radius"></i> <b>REGISTRATION FORM</b></h3>
                        <form id="member_edit" class="row" name="member" action="index.php" method="get">
                            <fieldset class="row-fluid">
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <input type="sumbit" name="nomor_anggota" required id="nomor_anggota" value="<?php echo $member['nomor_anggota']?>" class="form-control" placeholder="No. Angota MAI (Member Only)">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 text-center">
                                    <button type="submit" value="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Check</button>
                                </div>
                            </fieldset>
                        </form>
                        <form id="member_reg" class="row" name="member_reg" action="insert.php" method="post">
                            <fieldset class="row-fluid">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="hidden" name="no_mai" required id="no_mai" value="<?php echo $member['nomor_anggota']?>" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <p>Full Name:</p>
                                    <input type="text" name="full_name" required id="full_name" value="<?php echo $member['nama_anggota']?>" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <p>Degree:</p>
                                    <input type="text" name="degree" required id="degree" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <p>Institution:</p>
                                    <input type="text" name="inst" required id="inst" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <p>Email:</p>
                                    <input type="text" name="email" required id="email" value="<?php echo $member['email_rumah']?>" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <p>Phone:</p>
                                    <input type="text" name="no_phone" required id="no_phone" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <p>Mobile:</p>
                                    <input type="text" name="no_mobile" required id="no_mobile" value="<?php echo $member['nomor_handphone']?>" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <p>Street Address:</p>
                                    <textarea type="text" name="st_address" required id="st_address" class="form-control"><?php echo $member['alamat_rumah_jalan']?></textarea>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p>City:</p>
                                    <input type="text" name="city" required id="city" value="<?php echo $member['idwilayah_kecamatan_rumah']?>" class="form-control">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p>State/Province/Region:</p>
                                    <input type="text" name="region" required id="region" value="<?php echo $member['prov']?>" class="form-control">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p>Postal/Zip Code:</p>
                                    <input type="text" name="zip" required id="zip" class="form-control">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p>Country:</p>
                                    <input type="text" name="country" required id="country" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <input type="hidden" name="status" required id="status" value="<?php echo $status?>" class="form-control">
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                    <div class="custom-control custom-radio">  <!--Additional paper : 50 USD apa ini??????? -->
                                        <div id="reg_type" style="font-size:16px;">
                                            <label style="padding:-30px; font-size:20px">Registration Type for Indonesia</label>
                                            <br><input type="radio" class="custom-control-input" value="1" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked1">Presenter student : 1.500.000 IDR</label>
                                            <br><input type="radio" class="custom-control-input" value="2" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked2">Presenter reguler : 2.000.000 IDR</label>
                                            <br><input type="radio" class="custom-control-input" value="3" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked3">Presenter MAI Member : 1.500.000 IDR</label>
                                            <br><input type="radio" class="custom-control-input" value="4" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked4">Participant student : 1.500.000 IDR</label>
                                            <br><input type="radio" class="custom-control-input" value="5" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked5">Participant reguler : 2.000.000 IDR</label>
                                            <br><input type="radio" class="custom-control-input" value="6" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked6">Participant MAI Member : 1.500.000 IDR</label>
                                            <br><input type="radio" class="custom-control-input" value="7" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked7">Additional paper : 750.000 IDR</label></br>
                                            <br><label style="padding:-30px; font-size:20px">Registration Type for International</label>
                                            <br><input type="radio" class="custom-control-input" value="8" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked8">Presenter student : 170 USD</label>
                                            <br><input type="radio" class="custom-control-input" value="9" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked9">Presenter reguler : 250 USD</label>
                                            <br><input type="radio" class="custom-control-input" value="10" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked10">Presenter WAS Member : 200 USD</label>
                                            <br><input type="radio" class="custom-control-input" value="11" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked11">Participant student : 170 USD</label>
                                            <br><input type="radio" class="custom-control-input" value="12" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked12">Participant reguler : 250 USD</label>
                                            <br><input type="radio" class="custom-control-input" value="13" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked13">Participant WAS Member : 200 USD</label>
                                            <br><input type="radio" class="custom-control-input" value="14" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked14">Additional paper : 50 USD</label></br>
                                            <br><label style="padding:-30px; font-size:20px">Registration Special for Business Session (October, 5)</label>
                                            <br><input type="radio" class="custom-control-input" value="15" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked15">Participant Member MAI : 500.000 IDR</label>
                                            <br><input type="radio" class="custom-control-input" value="16" name="type_reg">
                                            <label class="custom-control-label" for="defaultUnchecked16">Participant Non Member : 750.000 IDR</label></br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" value="update" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Submit</button>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="button" data-toggle="modal" data-target="#resetModal" class="btn btn-light btn-radius btn-brd grd1 btn-block">Reset</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-body" style="font-size:16px;">
                              Are you sure to reset all data?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="button" onclick="confirm_reset()" data-dismiss="modal" class="btn btn-primary">Yes</button>
                            </div>
                          </div>
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
