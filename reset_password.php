<?php 
session_start();
if(empty($_SESSION['mail_vali'])){
  session_destroy();
  header('Location:forget_password.php');
  exit();
}
if(!empty($_SESSION['after_reset'])){
  session_destroy();
  header('Location:login.php');
  exit();
}
$newpassword = $newpassword_confirmation = $newpassword_err = $newpassword_confirmation_err = '';
require_once('connect_members.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(empty(trim($_POST['newpassword']))){
    $newpassword_err = '請輸入新密碼';
  }
  else if(strlen(trim($_POST['newpassword'])) < 6){
    $newpassword_err = '請輸入你的密碼';
  }
  else{
    $newpassword = trim($_POST['newpassword']);
  }

  if(empty(trim($_POST['newpassword_confirmation']))){
    $newpassword_confirmation_err = '請輸入新密碼確認';
  }
  else{
    $newpassword_confirmation = trim($_POST['newpassword_confirmation']);
    if(strlen($newpassword) != strlen($newpassword_confirmation)){
      $newpassword_confirmation_err = '輸入的密碼長度不同';
    }
    if($newpassword != $newpassword_confirmation){
      $newpassword_confirmation_err = '輸入的密碼不同';
    }
  }
  if(empty($newpassword_err) && empty($newpassword_confirmation_err)){
    $sql = "SELECT userid FROM members_account WHERE userid = ?";
    if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, 's', $param_userid);
      $param_userid = $_SESSION['param_userid'];
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1){

          $sql2 = "UPDATE members_account SET password = ? WHERE userid = ?";
          if($stmt2 = mysqli_prepare($link, $sql2)){
            mysqli_stmt_bind_param($stmt2,'ss',$param_password, $param_userid2);
            $param_userid2 = $_SESSION['param_userid'];
            $param_password = password_hash($newpassword, PASSWORD_DEFAULT);
            if(mysqli_stmt_execute($stmt2)){
              $_SESSION['reset_password_success'] = true;
              header('location:reset_password_success.php');
            }
          }
          mysqli_stmt_close($stmt2);

        }
      }
    }
    mysqli_stmt_close($stmt);
  }

}
?>
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



  <title>PULSER 2.0</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link href="custom_css/forget_password_css.css" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-fixed-top navbar-default topnav_css" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button id="theButton" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="index.php"><span id="navbar_brand_span" class="fa fa-home"></span></a>
        <label class="navbar-brand">PULSER 2.0</label>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="info.php"><label>說明</label></a></li>
          <li><a href="dash4.php"><label>服務</label></a></li>
          <li><a href="about.php"><label>關於我們</label></a></li>
          <!--<li><a href="index.php"><label class="fa fa-home"></label></a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login.php"><label>登入</label></a></li>
          <li><a href="register.php"><label>註冊</label></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="content_padding"></div>

  <div class="content_size">
    <div class="container-fluid">
      <form id="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form_inside_padding0"></div>
        <div class="form-group">
          <div class="text-left"><label class="title">重新設置密碼</label></div>
          <div class="form_inside_padding"></div>
          <?php echo '<div><i class="fa fa-user" aria-hidden="true"></i> 使用者 '.$_SESSION["param_userid"]?><?php echo '</div>'?>
          <div class="form_inside_padding"></div>
          <div class="form_inside_padding"></div>
          <label class="formlabel">請輸入新密碼</label>
          <div class="form_inside_padding"></div>
          <input id="password_id" type="password" class="form-control input-lg" name="newpassword">
          <span class="help-block"><?php echo $newpassword_err; ?></span>
          <span class='emsg_password'></span>
          <div class="form_inside_padding"></div>
          <label class="formlabel">請輸入新密碼確認</label>
          <div class="form_inside_padding"></div>
          <input id="password_confirmation_id" type="password" class="form-control input-lg" name="newpassword_confirmation">
          <span class="help-block"><?php echo $newpassword_confirmation_err; ?></span>
          <span class='emsg_password_confirmation'></span>
          <div class="form_inside_padding1"></div>
          <div class="text-right">
            <input type="hidden" name="refer" value=" <?php echo (isset($_GET['refer'])) ?$_GET['refer']:'reset_password.php';?>">
            <button id="submitBtn" type="submit" class="btn btn-primary" disabled="true">確認</button></div>
          </div>
          <div class="form_inside_padding2"></div>
        </form>

      </div>
    </div>

  </body>
  <script>
    function passthru(){
      $('#submitBtn').prop('disabled', false);
    }
    $('#password_id').on('input', function(){
      if($(this).val().length > 6){
        $('.emsg_password').html(' ');
        $('#submitBtn').prop('disabled', true);
        if($(this).val() == $('#password_confirmation_id').val()){
          passthru();
          $('.emsg_password_confirmation').html(' ');
        }
      }
      else{
        $('.emsg_password').html('請輸入大於6個字元');
        $('#submitBtn').prop('disabled', true);
      }
    });
    $('#password_confirmation_id').on('input', function(){
      if($(this).val().length > 6){
        if($(this).val() == $('#password_id').val()){
          $('.emsg_password_confirmation').html(' ');
          $('.emsg_password').html(' ');
          passthru();
        }
        else{
          $('.emsg_password_confirmation').html('輸入的密碼不同');
          $('#submitBtn').prop('disabled', true);
        }
      }
    });
  </script>
  </html>