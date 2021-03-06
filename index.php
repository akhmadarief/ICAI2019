<?php

include("conf.php");

if( !isset($_GET['nomor_anggota']) ){
	error_reporting(0);
}
else{
	$nomor_anggota = $_GET['nomor_anggota'];
	$query = mysqli_query($conn, "SELECT * FROM daftar_keanggotaan WHERE nomor_anggota='$nomor_anggota'");
	$member = mysqli_fetch_assoc($query);
	if($query->num_rows == 0){
		echo "<script>alert('No. Anggota MAI not found');</script>";
	}
	else{
		$status='MAI';
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
		document.getElementById("member").reset();
		document.getElementById("reg").reset();
	}
	</script>

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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

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
                        <form id="member" class="row" name="member" action="index.php" method="get">
                            <fieldset class="row-fluid">
                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                    <input type="sumbit" name="nomor_anggota" required id="nomor_anggota" value="<?php echo $member['nomor_anggota']?>" class="form-control" placeholder="No. MAI (Member Only)">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 text-center">
                                    <button type="submit" value="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Check</button>
                                </div>
                            </fieldset>
                        </form>
                        <form id="reg" class="row" name="reg" action="insert.php" method="post">
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
                                            <br><input type="radio" class="custom-control-input" value="1" name="type_reg" required>
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
                                    <button id="submitButton" type="button" data-toggle="modal" data-target="#submitModal" class="btn btn-light btn-radius btn-brd grd1 btn-block">Submit</button>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="button" data-toggle="modal" data-target="#resetModal" class="btn btn-light btn-radius btn-brd grd1 btn-block">Reset</button>
                                </div>
                                <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" style="word-wrap: break-word;" aria-labelledby="exampleModalLabel" aria-hidden="true" action="insert.php" method="post">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Are you sure your data is correct?
                                        </div>
                                        <div class="modal-body" style="font-size:16px;">
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Full Name :</div>
                                                    <div class="entrydata col-xs-7" id="mfull_name" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Degree :</div>
                                                    <div class="entrydata col-xs-7" id="mdegree" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Institution :</div>
                                                    <div class="entrydata col-xs-7" id="minst" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Email :</div>
                                                    <div class="entrydata col-xs-7" id="memail" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Phone :</div>
                                                    <div class="entrydata col-xs-7" id="mno_phone" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Mobile :</div>
                                                    <div class="entrydata col-xs-7" id="mno_mobile" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Street Address :</div>
                                                    <div class="entrydata col-xs-7" id="mst_address" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">City :</div>
                                                    <div class="entrydata col-xs-7" id="mcity" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">State/Province/Region :</div>
                                                    <div class="entrydata col-xs-7" id="mregion" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Postal/Zip Code :</div>
                                                    <div class="entrydata col-xs-7" id="mzip" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Country :</div>
                                                    <div class="entrydata col-xs-7" id="mcountry" style="padding-left:0;"></div>
                                                </div>
                                                <div class="row" style="display: block;">
                                                    <div class="entryname col-xs-5" style="text-align: right;">Registration Type :</div>
                                                    <div class="entrydata col-xs-7" id="mreg_type" style="padding-left:0;"></div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" value="update" id="submit" class="btn btn-primary">Yes</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    var all = "";
                                    $('#submitButton').click(function () {
                                    /* when the button in the form, 
                                    display the entered values in the modal */
                                    //console.log($("from input"));
                                        all = "";
                                        $.each($("form input"),function(i,v){
                                            var id= $(this).attr('id');
                                            //console.log(id);
                                            //console.log("#m"+id);
                                            $("#m"+id).text($(this).val());
                                            all = all + $(this).val();
                                        });
                                        hideEmptyInputs();    
                                    });
                                    $('#submitModal').on('show.bs.modal', function (e) {
                                        if(all == ""){
                                            e.preventDefault();
                                        }
                                    })
                                    
                                    function hideEmptyInputs(){
                                    //console.log($("#myModal div"));
                                    //console.log($("#myModal div[id^=m]"));
                                        $.each($("#submitModal div[id^=m]"),function(i,v){
                                            //console.log($(this).text());
                                            var value = $(this).text();
                                            if(value == ""){
                                            //Hide if empty
                                                $(this).parent().css('display','none');
                                            }
                                            else{
                                                $(this).parent().css('display','block');      
                                            }
                                        });
                                    //console.log("algo");
                                    }
                                </script>
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
                              <button type="button" onclick="confirm_reset()" data-dismiss="modal" class="btn btn-primary">Yes</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="big-tagline clearfix">
                        <h3 style="font-size: 50px; position: fixed; color: #ffffff; padding-right: 30px;">International Conference of Aquaculture Indonesia</h3>
                        <h2 style="font-size: 25px; position: fixed; padding: 150px 0 30px;">October 4-5th, 2019 - Surabaya, Indonesia</h2>
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
