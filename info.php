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
  <link href="custom_css/info_css.css" rel="stylesheet">
<style></style> 

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
          <li><a href="<?php echo (!(empty($_SESSION['login_userid'])) ? 'profile.php' : 'login.php')?>"><label><?php echo (!(empty($_SESSION['login_userid'])) ? $_SESSION['login_userid'] : '登入')?></label></a></li>
          <li><a href="<?php echo (!(empty($_SESSION['login_userid'])) ? 'logout.php' : 'register.php')?>"><label><?php echo (!(empty($_SESSION['login_userid'])) ? '登出' : '註冊')?></label></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!--<div id="content_padding"></div>-->


  <div class="content_size">
  
    <div id="index_word" class="index_content_css">
      <div style="padding-top: 10%;"></div>
    </br>
      <p>
        <ul>
        <li><h1 id="firstH1">(一)平台規劃:</br>首頁部份分為兩區塊，分別為左上角以及右上角，左上角為網站連結區，右上角為會員中心區。主畫面分為左上角、右上角以及主要內容區，左上角備有側邊滑動選單，裡面有各樣功能的連結區塊，右上角為會員中心，會員可在裏頭修改基本資料及登出。本平台可在電腦及行動裝置上使用。</h1></li>
        </ul>
      </p>
      <p>
        <ul>
          <li><h1 id="firstH2">
            (二)如何使用此平台:</br>剛使用本平台嗎? 先到首頁右上方註冊吧!
            我們的功能主要有:</br>
            1.Dashboard區:可清楚看到最近一次量測的結果以及身體相關的警訊。</br>
            2.紀錄搜尋:可以看到過去的量測結果圖形。</br>
            3.個人資訊設定:可以修改您的基本資料。
          </h1></li>
        </ul>
      </p>
      <p>
      <ul>
        <li><h1 id="firstH3">
          (三)對本平台有任何建議嗎?</br>歡迎到聯絡我們給予我們您寶貴的意見!
        </h1></li>
      </ul>
      </p>
      
    </div>

  </div>

</body>
<script>

</script>

</html>
