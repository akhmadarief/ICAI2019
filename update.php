<?php

include("conf.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['update'])){
	
	// ambil data dari formulir
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
	//$status = $_POST['status'];
	//$reg_type = $_POST['reg_type'];
	//$no_mai = $_POST['no_mai'];
	//$price = $_POST['price'];
	
	// buat query update
	//$sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
	$query = mysqli_query($db, "UPDATE register SET full_name='$full_name', degree='$degree', inst='$inst', email='$email', no_phone='$no_phone', no_mobile='$no_mobile', st_address='$st_address', city='$city', region='$region', zip='$zip', country='$country' WHERE id='$id'");
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: call.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}
?>