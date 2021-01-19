<?php
session_start();
header ( "Content-type: application/vnd-ms-excel" ) ; 
header ( "Content-Disposition: attachment; filename=SoldReport.xls" ) ; 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
include 'brang.php' ;
// exit;
 ?>