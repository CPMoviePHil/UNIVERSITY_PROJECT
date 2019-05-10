<?php
require_once ('connect_members.php');
session_start();

$user_activated = $_GET['username'];
$code_activated = $_GET['code'];

if(!(empty($_SESSION['login_userid'])))
{
  session_destroy();
}

$findUserIdSql = "SELECT userid, code FROM members_account WHERE userid= ? AND code =?";

if($MatchStmt = mysqli_prepare($link, $findUserIdSql)){
  mysqli_stmt_bind_param($MatchStmt, 'ss', $param_userid, $param_code);
  $param_userid = $user_activated;
  $param_code = $code_activated;
  if(mysqli_stmt_execute($MatchStmt)){
    mysqli_stmt_store_result($MatchStmt);
    if(mysqli_stmt_num_rows($MatchStmt) === 1){
      echo 'Account_Match!';

      $sql = "SELECT active_status FROM members_account WHERE userid = ?";
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, 's', $param_username);
        $param_username = $user_activated;
        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) === 1){
            mysqli_stmt_bind_result($stmt, $param_activate);
            if(mysqli_stmt_fetch($stmt)){
              if($param_activate == 1){
                $UpdateSql = "UPDATE members_account SET active_status = ? WHERE userid = ? AND code =?";
                if($UpdateStmt = mysqli_prepare($link, $UpdateSql)){
                  mysqli_stmt_bind_param($UpdateStmt, 'iss', $param_active_status, $param_userid2, $param_code2);
                  $param_active_status = 0;
                  $param_userid2 = $user_activated;
                  $param_code2 = $code_activated;
                  if(mysqli_stmt_execute($UpdateStmt)){
                    echo '帳號激活成功!';
                    $fetch_account = "SELECT userid, username, mail_address FROM members_account WHERE userid = ?";
                    if($fetch_stmt = mysqli_prepare($link, $fetch_account)){
                      mysqli_stmt_bind_param($fetch_stmt,'s', $fetch_userid);
                      $fetch_userid = $user_activated;
                      if(mysqli_stmt_execute($fetch_stmt)){
                        mysqli_stmt_store_result($fetch_stmt);
                        if(mysqli_stmt_num_rows($fetch_stmt) === 1){
                          mysqli_stmt_bind_result($fetch_stmt, $fetch_userid, $fetch_username, $fetch_mail_address);
                          if(mysqli_stmt_fetch($fetch_stmt)){
                            $Update_information = "INSERT INTO users_information (userid, username, mail_address) VALUES (?,?,?)";
                            if($update_information_stmt = mysqli_prepare($link, $Update_information)){
                              mysqli_stmt_bind_param($update_information_stmt, "sss", $param_userid4, $param_name4, $param_mail4);
                              $param_userid4 = $fetch_userid;
                              $param_name4 = $fetch_username;
                              $param_mail4 = $fetch_mail_address;

                              if(mysqli_stmt_execute($update_information_stmt)){
                                header("location:register_success.php?user=$user_activated&code=$code_activated");
                              } 
                            }
                            mysqli_stmt_close($update_information_stmt);
                          }

                        }
                      }
                    }
                    mysqli_stmt_close($fetch_stmt);
                  }
                  else{
                    echo '帳號激活失敗...';
                  }

                }
                mysqli_stmt_close($UpdateStmt);
              }
              else{
                header("location:register_succeeded.php");
              }
            }
          }
        }
      }
      mysqli_stmt_close($stmt);
    }
    else{
      echo 'Account not match!';
    }
  }
}
mysqli_stmt_close($MatchStmt);

/*$findAccount = "SELECT userid FROM members_account WHERE code = ?";
$user_check = 0;
if($findStmt = mysqli_prepare($link, $findAccount)){
  mysqli_stmt_bind_param($findStmt, 's', $param_code3);
  $param_code3 = $code_activated;
  if(mysqli_stmt_execute($findStmt)){
    mysqli_stmt_store_result($findStmt);
    if(mysqli_stmt_num_rows($findStmt) === 1){
      mysqli_stmt_bind_result($findStmt, $param_find_userid);
      if(mysqli_stmt_fetch($findStmt)){
        $user_check = $param_find_userid;
      }
    }
  }
}
mysqli_stmt_close($findStmt);

$temp = md5((base64_encode('20KKK_doolittle')).$username.'seanisgreat');
*/

?>
