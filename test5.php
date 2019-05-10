<?php
session_start();
if(!(empty($_POST["suggest"]))){
	$_SESSION['date_map1'] = $_POST["suggest"];
}
echo ($_SESSION['date_map1']);
?>