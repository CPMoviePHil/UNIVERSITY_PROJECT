<?php
session_start();
if(empty($_SESSION['after_sent'])){
  session_destroy();
  header('Location:forget_password.php');
  exit();
}
$str = $_SERVER['QUERY_STRING'];
$param = explode('&',$str);
$param_userid = explode('=',$param[0]);
$userid = $param_userid[1];
echo $userid;
$param_mail = explode('=',$param[1]);
$mail = $param_mail[1];
echo $mail;

if(($_SESSION['param_userid']==$userid)&&($_SESSION['param_mail_address']==$mail)){
  $_SESSION['mail_vali'] = true;
  header('Location:reset_password.php');
}
else{
  header('Location:forget_password.php');
  exit();
}

?>