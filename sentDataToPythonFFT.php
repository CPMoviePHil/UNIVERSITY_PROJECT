<?php 
session_start();
$sentData = $_SESSION['rawDataName'];
$python = "D:\\Python36\\python.exe";
$pythonscript = "C:\\xampp\\htdocs\\Project\\ff3-4.py";

$output = array();
$cmd = ("$python $pythonscript $sentData");
exec("$cmd",$output);
echo json_encode($output);
?>