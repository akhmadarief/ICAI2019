<?php
//Untuk memanggil modul
require_once 'bootstrap.php';
require_once 'vendor/autoload.php';
require_once 's.php';
set_time_limit(500);
//Koneksi Database
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'yo'; // Nama Database
//$id = $_GET['id'];
//$full_name = $row['full_name'];
//echo $id;

$cd = date("d-m-Y");

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());	
}

$sql = "SELECT * FROM register";
$query = mysqli_query($conn, $sql)


while($row = mysqli_fetch_array($query))
{
  $id = $row['id'];
  $full_name = $row['full_name'];
  echo $id;
  echo $full_name;

  $phpWord = new \PhpOffice\PhpWord\PhpWord();
  $template = new \PhpOffice\PhpWord\TemplateProcessor('invoice.docx');
  $template->setValue('tanggal', $cd);
  $template->setValue('ID', $id);
  $template->setValue('full_name', $row['full_name']);
  $template->setValue('reg_type', $row['reg_type']);
  $template->setValue('price', $row['price']);
  $template->setValue('price', $row['price']);
  $template->saveAs('result.docx');

//Membuat PDF dari Word

  $word = new COM("Word.Application") or die ("Could not initialise Object.");
  // set it to 1 to see the MS Word window (the actual opening of the document)
  $word->Visible = 0;
  // recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
  $word->DisplayAlerts = 0;
  // open the word 2007-2013 document 
  $word->Documents->Open('C:\xampp\htdocs\test\ICAI2019\result.docx');
  // save it as word 2003
  $word->ActiveDocument->SaveAs('C:\xampp\htdocs\test\ICAI2019\Cetak\Kwitansi\kwitansi_'.$id.'.doc');
  // convert word 2007-2013 to PDF
  $word->ActiveDocument->ExportAsFixedFormat('C:\xampp\htdocs\test\ICAI2019\Cetak\Kwitansi\kwitansi_'.$id.'.pdf', 17, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
  // quit the Word process
  $word->Quit(false);
  // clean up
  unset($word);
  //cetak($id);

}

?>
