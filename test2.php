<?php
require_once('connect_members.php');
session_start();
$userid = $_SESSION['login_userid'];
$user_date = '';
$user_date_err = '';
$option_times = array();
$which_map = '';
$which_map_err = '';

$sql = "SELECT measure_time FROM user_measure WHERE userid = ? ORDER BY measure_time DESC";
if($stmt = mysqli_prepare($link, $sql))
{
	mysqli_stmt_bind_param($stmt, 's', $param_userid);
	$param_userid = $userid;
	if(mysqli_stmt_execute($stmt))
	{
		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt) > 0)
		{
			mysqli_stmt_bind_result($stmt, $choose_times);
			while(mysqli_stmt_fetch($stmt))
			{
				$option_times[] = $choose_times;
			}	
		}
		else
		{
			$option_times = 0;
		}
	}
}
mysqli_stmt_close($stmt);

echo json_encode($option_times);
?>