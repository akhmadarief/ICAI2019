<?php

require_once 'bootstrap.php';
require_once 'vendor/autoload.php';
require "conf.php";

$sql2 = "SELECT COUNT(*) FROM register";
$query = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($query);

//menghitung progress
$i = 1;
$bagi = $row['COUNT(*)'];
$hitung = ($i/($bagi));

$sql = "SELECT * 
FROM register";

$query = mysqli_query($conn, $sql);

if (!$query) {
  die ('SQL Error: ' . mysqli_error($conn));
}

while ($row = mysqli_fetch_array($query))
{


  $id = $row['id'];
$full_name = $row['full_name'];
$cd = date("d-m-Y");
$full_name=$row['full_name'];
$reg_type=$row['reg_type'];
$price=$row['price'];
$inst=$row['inst'];
$country=$row['country'];

//mencetak semua invoice
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$template = new \PhpOffice\PhpWord\TemplateProcessor('berkas\invoice.docx');
$template->setValue('tanggal', $cd);
$template->setValue('ID', $id);
$template->setValue('full_name', $row['full_name']);
$template->setValue('reg_type', $row['reg_type']);
$template->setValue('price', $row['price']);
$template->setValue('inst', $row['inst']);
$template->saveAs('Cetak\semua\inv_'.$id.'_'.$full_name.'.docx');

//mencetak semua certifacate
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$template = new \PhpOffice\PhpWord\TemplateProcessor('berkas\cert.docx');
$template->setValue('full_name', $row['full_name']);
$template->setValue('inst', $row['inst']);
$template->setValue('country', $row['country']);
$template->saveAs('Cetak\semua\cert_'.$id.'_'.$full_name.'.docx');
$hitung = ($i/($bagi))*100;
$i++;


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
  //cetak($id);
*/
}
echo $hitung."%";
?>
