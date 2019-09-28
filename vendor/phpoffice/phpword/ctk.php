<?php
require_once 'bootstrap.php';

$template = new TemplateProcessor(‘ganti.docx’);
    $template->setValue('[ganti]', 'John Doe');
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld.docx');