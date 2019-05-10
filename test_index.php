<?php
session_start();
if(empty($_SESSION['login_userid'])){
  $_SESSION['login_userid'] = "";
}
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



  <title>PULSER 2.0</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link href="custom_css/test_css.css" rel="stylesheet">

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
          <li><a href="#"><label>產品</label></a></li>
          <li><a href="#"><label>應用程式</label></a></li>
          <li><a href="#"><label>說明</label></a></li>
          <li><a href="#"><label>服務</label></a></li>
          <!--<li><a href="index.php"><label class="fa fa-home"></label></a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo (!(empty($_SESSION['login_userid'])) ? 'profile.php' : 'login.php')?>"><label><?php echo (!(empty($_SESSION['login_userid'])) ? $_SESSION['login_userid'] : '登入')?></label></a></li>
          <li><a href="<?php echo (!(empty($_SESSION['login_userid'])) ? 'logout.php' : 'register.php')?>"><label><?php echo (!(empty($_SESSION['login_userid'])) ? '登出' : '註冊')?></label></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="content_padding"></div>

  <div class="content_size">

    <div id="index_word" class="index_content_css">
    </div>
    <pre>
      現代人愈來愈注重健康，全民力行健康管理的個人醫療保健時代已經到來。
      我們將運用資訊技術進行脈搏聲音的量測及分析，方便提供中醫師在臨床治療上進
      行更精確的診斷及更準確的數據，並讓患者紀錄儲存脈搏聲音資訊，對患者做最好
      的診斷。</pre>
  </div>

</body>
<script>

</script>

</html>
