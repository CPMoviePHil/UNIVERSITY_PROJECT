
<?php 
/*require_once('connect_members.php');
$mail_address = '';
if(!empty(trim($_POST['type_mail_address']))){
  $mail_address = trim($_POST['type_mail_address']);
}
$sql = "SELECT id FROM members_account WHERE mail_address =?";
if($stmt = mysqli_prepare($link, $sql)){
  mysqli_stmt_bind_param($stmt,'s',$param_mail);
  $param_mail = $mail_address;
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
      echo('find you mail');
      header('location:modify_password.php');
    }
    else{
      echo('none');
    }
  } 
}
mysqli_stmt_close($stmt);


mysqli_close($link);
*/


require_once('connect_members.php');
$mail_address = '';
if(!empty(trim($_POST['type_mail_address']))){
  $mail_address = trim($_POST['type_mail_address']);
}
$sql = "SELECT userid, mail_address FROM members_account WHERE mail_address =?";
if($stmt = mysqli_prepare($link, $sql)){
  mysqli_stmt_bind_param($stmt,'s',$param_mail);
  $param_mail = $mail_address;
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
      /*echo('find you mail');
      session_start();
      
      */
      mysqli_stmt_bind_result($stmt, $param_userid, $param_mail_address);
      if(mysqli_stmt_fetch($stmt)){
        session_start();
        $_SESSION['param_userid'] = $param_userid;
        $_SESSION['param_mail_address'] = $param_mail_address;
        sendMail($_SESSION['param_userid'], $_SESSION['param_mail_address']);
        header('location:modify_password.php');
      }
    }
    else{
      echo('none');
    }
  } 
}
mysqli_stmt_close($stmt);

function sendMail($userId, $userMail){
  $to = $userMail;
  $subject = 'Pulser 2.0 重新設置密碼';
  $url = 
  "<html>
  <head>
    <title>reset_password</title>
  </head>
  <body>
  <a href='localhost/project/reset_password_via_mail_confirmation.php?userid=$userId&mail=$userMail'>請點閱
  </a>
  </body>
  </html>";
  $msg = $url;
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  
  if(mail("$to", "$subject", "$msg", "$headers")):
   echo "信件已經發送成功。";
 else:
   echo "信件發送失敗！";
 endif;
}
mysqli_close($link);


?>


