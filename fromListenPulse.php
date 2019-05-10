<?php 
set_time_limit(0);

session_start();
require_once('connect_members.php');

$userid = $_SESSION['login_userid'];
date_default_timezone_set('Asia/Taipei');
$date = date('Y-m-d H:i:s');

$formattedDate = date('Y-m-d-H-i-s');
$sentData = $userid.'-'.$formattedDate;


if(!(empty(trim($_POST['data'])))){
	$saveSql = "INSERT INTO user_measure (userid, measure_time) VALUES (?,?)";
	if($saveDate = mysqli_prepare($link, $saveSql)){
		mysqli_stmt_bind_param($saveDate, 'ss', $param_userid, $param_time);
		$param_userid = $userid;
		$param_time = $date;
		if(mysqli_stmt_execute($saveDate)){
			$theFileName = $sentData.'.txt';
			$txt = str_replace(",","\r\n",(trim($_POST['data'])));
			$myfile = file_put_contents($theFileName,$txt) or die("Unable to open file!");
		}
		else{
			echo 'none, failed...';
		}
	}
	mysqli_stmt_close($saveDate);
}
else{
	echo 'failed';
}
?>