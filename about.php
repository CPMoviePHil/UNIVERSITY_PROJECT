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
      <p>
        <b><h1 style="font-size: 5vmin;text-align: center;margin-top: 180px">關於我們</h1></b>
      </p>
    </br>
    <p>
      <ul>
        <li><h1 id="firstH1">我們是國立高雄科技大學資訊管理系的學生，我們的專題研究將針對脈搏測量做出改變，用數位訊號的方式來聽取患者的脈搏聲音，用來取代過往中醫師把脈的方式。</br>在資訊呈現方面，我們將會提供測量到的脈搏聲音數據做成圖形，包括原始脈搏聲音資料圖形和經過FFT快速傅立葉轉換的圖形及表格。系統顯示畫面將以RWD響應式網頁和PC網頁兩種的方式讓中醫師便利的觀察診斷或患者保存及上傳脈搏聲音資訊。</h1></li>
      </ul>
    </p>
    <p>
      <ul>
        <li>
          <h1 id="firstH2">
            指導教授: 鄭進興 老師
          </br></br>
        專題生: 0424002 黃智輝</br>
        專題生: 0424090 劉大維 
      </h1>
    </li>
  </ul>
</p>
</div>

</div>

</body>
<script>

</script>

</html>
