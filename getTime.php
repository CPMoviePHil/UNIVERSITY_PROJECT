<?php
require_once('connect_members.php');
if(!(empty(trim($_POST['sent_date'])))){
	$date1 = trim($_POST['sent_date']);
	$temp = explode("-",$date1);
	$tempDate = $temp[2] - 1;
	$date2 = $temp[0].'-'.$temp[1].'-'.$tempDate;
	$date2 = $date2.'00:00:00';
	$date3 = $date1.'00:00:00';
	$option_times = array();
	
	$sql = "SELECT measure_time FROM user_measure WHERE measure_time >= ? AND measure_time < ?";

	if($stmt = mysqli_prepare($link,$sql)){
		mysqli_stmt_bind_param($stmt, 'ss', $param_date,$param_date1);
		$param_date = $date2;
		$param_date1 = $date3;
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) > 0){
				mysqli_stmt_bind_result($stmt, $choose_times);
				while(mysqli_stmt_fetch($stmt)){
					$option_times[] = $choose_times;
				}
			}
			else{
				$option_times = '0';
			}
		}
	}
	mysqli_stmt_close($stmt);
	echo json_encode($option_times);
}
?>