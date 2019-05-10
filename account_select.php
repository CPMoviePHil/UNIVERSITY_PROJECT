<?php 
require_once('connect_members.php');
if(!empty(trim($_POST['user_enter_username']))){
	$check_active = "SELECT active_status FROM members_account WHERE userid = ?";
	if($active_stmt = mysqli_prepare($link, $check_active)){
		mysqli_stmt_bind_param($active_stmt, 's', $param_userid1);
		$param_userid1 = trim($_POST['user_enter_username']);
		if(mysqli_stmt_execute($active_stmt)){
			mysqli_stmt_store_result($active_stmt);
			if(mysqli_stmt_num_rows($active_stmt)){
				mysqli_stmt_bind_result($active_stmt, $param_active_status);
				if(mysqli_stmt_fetch($active_stmt)){
					if($param_active_status === 0){
						$sql = "SELECT id FROM members_account WHERE userid = ?";
						if($stmt = mysqli_prepare($link,$sql)){
							mysqli_stmt_bind_param($stmt, 's', $param_userid);
							$param_userid = trim($_POST['user_enter_username']);
							if(mysqli_stmt_execute($stmt)){
								mysqli_stmt_store_result($stmt);
								if(mysqli_stmt_num_rows($stmt) == 1){
									echo 'true';
								}
								else{
									echo 'false';
								}
							}
						}
						mysqli_stmt_close($stmt);
					}
					else{
						echo 'false';
					}
				}
			}
		}
	}
	mysqli_stmt_close($active_stmt);
}
mysqli_close($link);

?>