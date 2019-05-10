<?php 
session_start();
if(empty($_SESSION['param_userid'])){
  session_destroy();
  header('Location:forget_password.php');
  exit();
}
$_SESSION['after_sent'] = true;
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
      <form id="myForm" method="post">
        <div class="form_inside_padding0"></div>
        <div class="form-group">
          <div class="text-left"><label class="title">信箱已成功寄出</label></div>
          <div class="form_inside_padding"></div>
          <div class="form_inside_padding"></div>
          <label style="font-size:20px;">請到你的信箱裡點閱重新設置密碼的連結</label>
          <div class="form_inside_padding"></div>
          <a href="login.php">回到登入?</a><a href="register.php">回到註冊?</a>
          <div class="form_inside_padding1"></div>
        </div>
        <div class="form_inside_padding2"></div>
      </form>

    </div>
  </div>

</body>
</html>