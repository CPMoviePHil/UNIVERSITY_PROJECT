<?php 
session_start();

$python = "D:\\Python36\\python.exe";
$pythonscript = "C:\\xampp\\htdocs\\Project\\ff3-4.py";


$which_date = $_SESSION['date_map1'];
$which_filename1 = str_replace(' ',"-",$which_date);
$which_filename2 = str_replace(':',"-",$which_filename1);

$item2 = $_SESSION['login_userid'].'-'.$which_filename2;
$output = array();
$cmd = ("$python $pythonscript $item2");
exec("$cmd",$output);
echo json_encode($output);

?>