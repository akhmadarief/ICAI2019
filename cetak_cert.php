<?php

require_once 'bootstrap.php';
require_once 'vendor/autoload.php';
//require_once 's.php';

$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'icai2019'; // Nama Database
$id = $_GET['id'];


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());	
}

$sql = "SELECT * 
FROM register where id='$id'";

$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}


$row = mysqli_fetch_array($query);
$full_name = $row['full_name'];


$cd = date("d-m-Y");
$full_name=$row['full_name'];
$reg_type=$row['reg_type'];
$price=$row['price'];
$inst=$row['inst'];
$country=$row['country'];
include 'c_cert.php';

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$template = new \PhpOffice\PhpWord\TemplateProcessor('berkas\cert.docx');
$template->setValue('tanggal', $cd);
$template->setValue('ID', $id);
$template->setValue('full_name', $row['full_name']);
$template->setValue('reg_type', $row['reg_type']);
$template->setValue('price', $row['price']);
$template->setValue('inst', $row['inst']);
$template->saveAs('Cetak\cert_'.$id.'_'.$full_name.'.docx');
//include 's.php';

//Membuat PDF dari Word
/*
$word = new COM("Word.Application") or die ("Could not initialise Object.");
  // set it to 1 to see the MS Word window (the actual opening of the document)
$word->Visible = 0;
  // recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
$word->DisplayAlerts = 0;
  // open the word 2007-2013 document 
$word->Documents->Open('C:\xampp\htdocs\ICAI2019\result.docx');
  // save it as word 2003
$word->ActiveDocument->SaveAs('C:\xampp\htdocs\ICAI2019\Cetak\Kwitansi\kwitansi_'.$id.'.doc');
  // convert word 2007-2013 to PDF
$word->ActiveDocument->ExportAsFixedFormat('C:\xampp\htdocs\ICAI2019\Cetak\Kwitansi\kwitansi_'.$id.'.pdf', 17, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
  // quit the Word process
$word->Quit(false);
  // clean up
unset($word);
exec("print C:\xampp\htdocs\ICAI2019\result.docx");
cetak($id);

echo '<a href="s.php" target="_new">Continue to next page</a>'
*/

?>
