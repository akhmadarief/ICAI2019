<?php
function cetak(&$id) {

	$file = ('Cetak\Kwitansi\kwitansi_'.$id.'.pdf'); 
	$filename = ('Cetak\Kwitansi\kwitansi_'.$id.'.pdf'); 
	
// Header content type 
	header('Content-type: application/pdf'); 
	
	header('Content-Disposition: inline; filename="' . $filename . '"'); 
	
	header('Content-Transfer-Encoding: binary'); 
	
	header('Accept-Ranges: bytes'); 
	
// Read the file 
	@readfile($file); 

//ini buat cetak
	echo '<body onload="window.print()">';

}
?>