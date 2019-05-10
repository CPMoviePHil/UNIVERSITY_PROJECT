<?php
session_start();
if(!(empty($_SESSION['login_userid'])))
{
  header("Location: index.php");
}
// Include config file
require_once ('connect_members.php');


$username = $password = $confirm_password = $user_real_name = $mail_address = "";

$username_err = $password_err = $confirm_password_err = $user_real_name_err = $mail_address_err = "";

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
  if(empty(trim($_POST["user_register_id"]))){
    $username_err = "請輸入帳號";
  } else{

        // Prepare a select statement
    $sql = "SELECT id FROM members_account WHERE userid = ?";

    if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
      $param_username = trim($_POST["user_register_id"]);

            // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){

        /* store result */
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) == 1){
          $username_err = "此帳號已被採用!";
        } else{
          $username = trim($_POST["user_register_id"]);
        }
      } else{
        echo "抱歉...請重新再輸入一次";
      }
    }
    mysqli_stmt_close($stmt);
  }
  if(empty(trim($_POST['user_register_real_name']))){
    $user_real_name_err = "請輸入姓名";
  }else{
    $user_real_name = trim($_POST['user_register_real_name']);
  }

    // Validate password
  if(empty(trim($_POST['user_reiger_password']))){
    $password_err = "請輸入密碼.";     
  } elseif(strlen(trim($_POST['user_reiger_password'])) < 6){
    $password_err = "密碼長度至少要6個以上";
  } else{
    $password = trim($_POST['user_reiger_password']);
  }

    // Validate confirm password
  if(empty(trim($_POST["register_passoword_confirmation"]))){
    $confirm_password_err = '請再次輸入密碼';     
  } else{
    $confirm_password = trim($_POST['register_passoword_confirmation']);
    if($password != $confirm_password){
      $confirm_password_err = '密碼輸入不同!';
    }
  }
  if(empty(trim($_POST['register_mail']))){
    $mail_address_err = "請輸入註冊信箱";
  }else{
    $sql_mail = "SELECT id FROM members_account WHERE mail_address = ?";
    if($stmt = mysqli_prepare($link, $sql_mail)){
      mysqli_stmt_bind_param($stmt, 's', $param_mail_address);
      $param_mail_address = trim($_POST['register_mail']);
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)==1){
          $mail_address_err = "此信箱已被採用";
        }
        else{
          $mail_address = trim($_POST['register_mail']);
        }
      }
      else{
        echo "抱歉...請重新再輸入一次";
      }

    }
    mysqli_stmt_close($stmt);
  }


    // Check input errors before inserting in database
  if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($user_real_name_err) && empty($mail_address_err)){

    $md5_code = md5(md5(base64_encode(rand(1,100).'pulser'.$username.'jhddc12'))).base64_encode($username);
    $activate_status = 1;

    $sql = "INSERT INTO members_account (userid, username, password, mail_address, active_status, code) VALUES (?, ?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssss", $param_userid, $param_name, $param_password, $param_mail, $param_status, $param_code);

            // Set parameters
      $param_userid = $username;
      $param_name = $user_real_name;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_mail = $mail_address;
            $param_status = $activate_status;
            $param_code = $md5_code;


            if(mysqli_stmt_execute($stmt)){
              $get_user = $username;
              $site = 'localhost/project';
              $to = $mail_address;
              $temp_md5 = base64_encode(md5(rand(1,1000))).md5($mail_address.'woudhodfbdf'.$get_user);
              $message = 
              "<html>
              <head>
              <title>activate</title>
              </head>
              <body>
              <a href='$site/activating_account.php?username=$get_user&code=$md5_code&te=$temp_md5' class='button'>請點閱</a>
              <p>請激活你的帳號</p>
              <p>歡迎使用pusler 2.0<p>
              </body>
              </html>"
              ;
              $subject = "親愛的用戶，$user_real_name";
              $headers  = 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
              if(mail("$to", "$subject", "$message", "$headers")):
               echo "信件已經發送成功。";
               header("location: sent_maill_success.php");
             else:
               echo "信件發送失敗！";
             endif;
           }
           else{
            echo "抱歉...請再次輸入資訊!!";
          }
            // Attempt to execute the prepared statement
            /*if(mysqli_stmt_execute($stmt)){
                // Redirect to login page

              $sql2 = "INSERT INTO users_information (userid,username,mail_address) VALUES (?,?,?)";

              if($stmt2 = mysqli_prepare($link, $sql2)){

            // Bind variables to the prepared statement as parameters
               mysqli_stmt_bind_param($stmt2, "sss", $param_userid2, $param_name2, $param_mail2);

            // Set parameters
               $param_userid2 = $username;
               $param_name2 = $user_real_name;
               $param_mail2 = $mail_address;


            // Attempt to execute the prepared statement
               if(mysqli_stmt_execute($stmt2)){
                // Redirect to login page
                session_start();
                $_SESSION['success'] = true;
                header("location: register_success.php");
              } else{
                echo "抱歉...請再次輸入資訊!!!!!";
              }
            }         

        // Close statement
            mysqli_stmt_close($stmt2);
          } else{
            echo "抱歉...請再次輸入資訊!!";
          }*/
        }         

        // Close statement
        mysqli_stmt_close($stmt);
      }


      if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($user_real_name_err) && empty($mail_address_err)){

        // Prepare an insert statement

      }
    // Close connection
    }

    ?>
    <html lang="zh-Hant">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/jquery.js"></script>
      <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
      <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


      <title>PULSER 2.0</title>

      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

      <!--custom-css-->
      <link href="custom_css/register_css.css" rel="stylesheet">
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
            <ul class="nav navbar-nav navbar-right" id="navbarRight">
              <li><a href="login.php"><label>登入</label></a></li>
              <li><a id ="span1"><span class="fa fa-facebook-official"></span></a></li>
              <li><a id ="span2"><span class="fa fa-instagram"></span></a></li>
              <li><a id ="span3"><span class="fa fa-google-plus-official"></span></a></li>
            </ul>
          </div>
        </div>
      </nav>


      <div class="topnav_and_form_padding"></div>

      <form id="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="container-fluid" id="formContent">
          <div class="register_box">

            <div class="form_inside_padding"></div>

            <div class="text-center"><span id="form_title">歡迎使用PULSER 2.0</span></div>
            <div class="form_inside_padding2"></div>
            <div class="form-group" <?php echo (!empty($username)) ? 'has-error' : ''; ?>">
              <label>帳號</label><span class="emsg_userid"></span><span class="emsg_userid2 hidden">請輸入正確的字元</span><span class="emsg_userid_empty hidden">請填入你的帳號</span><span id="emsg_userid"></span>
              <input placeholder="請輸入帳號..." class="form-control" type="text" name="user_register_id" id="userid" spellcheck="false" autocomplete="off" autofocus>
              <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group" <?php echo (!empty($user_real_name)) ? 'has-error' : ''; ?>">
              <label>姓名</label>
              <input placeholder="請輸入姓名..." class="form-control" type="text" name="user_register_real_name" id="name" spellcheck="false" autocomplete="off">
              <span class="help-block"><?php echo $user_real_name_err; ?></span>
            </div>
            <div class="form-group" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label>密碼</label><span class='emsg_passowrd'></span>              
              <input placeholder="請輸入密碼..." class="form-control" type="password" name="user_reiger_password" 
              value="<?php echo $password; ?>" id="password" spellcheck="false">
              <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group" <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
              <label>確認密碼</label>

              <span class="emsg_password_confirmation"></span>
              <input placeholder="密碼確認..." class="form-control" type="password" name="register_passoword_confirmation"
              value="<?php echo $confirm_password; ?>" id="password_confirmation" spellcheck="false">
              <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group" <?php echo (!empty($mail_address)) ? 'has-error' : ''; ?>">
              <label>註冊信箱</label>
              <span class="emsg_mail"></span>
              <span class="emsg_mail_empty hidden">請填入你的信箱</span>
              <span id="emsg_mail2"></span>
              <input placeholder="請輸入信箱..." class="form-control" type="text" name="register_mail" id="register_mail" spellcheck="false" autocomplete="off">
              <span class="help-block"><?php echo $mail_address_err; ?></span>
            </div>

            <div class="form_inside_padding4"></div>
            <div class="form_inside_padding4"></div>
            <div class="text-center">
             <input type="hidden" name="refer" value=" <?php echo (isset($_GET['refer'])) ?$_GET['refer']:'register.php';?>">
             <button id="subButton" type="submit" class="btn btn-info btn-lg round" disabled="true">註冊</button>
           </div>
           <div class="form_inside_padding3"></div>
           <div class="form-group text-center">
            <a href="login.php">已經有帳號了嗎?</a>
          </div>
          <div class="form_inside_padding3"></div>
        </div>
      </div>
    </form>
    <div class="buttom_padding"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
        $('#myForm')[0].reset();
        $('input#userid').focus();
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script>
      $('#subButton').on('click', function(){

      });
    </script>
    <script>
      var userid_vali = false;
      var name_vali = false;
      var password_vali = false;
      var password_confirmation_vali = false;
      var mail_address_vali = false;

      function valipassthru(){
        if(userid_vali && name_vali && password_vali && password_confirmation_vali && mail_address_vali){
          $('#subButton').prop('disabled', false);
        }
      }
      $('#userid').on('input', function(){
        if($(this).val().length > 6){
          $('.emsg_userid').html(' ');
          $.post('register_userid_check.php',{userid:$(this).val()},function(data){
            if(data == '1'){
              $('.emsg_userid').html('此帳號已被採用');
              console.log(data + '-userid');
              $('#subButton').prop('disabled', true);
              userid_vali = false;
            }
            else{
              console.log(data + '-userid');
              $('.emsg_userid').html(' ');
              userid_vali = true;
              valipassthru();
            }
          });
        }
        else{
          $('.emsg_userid').html('請輸入大於6碼');
          $('#subButton').prop('disabled', true);
          userid_vali = false;
        }
      });
      $('#name').on('keyup', function(){
        name_vali = true;
        valipassthru();
      });
      $('#password').on('keyup', function(){
        if($(this).val().length > 6 ){
          $('.emsg_passowrd').html(' ');
          password_vali = true;
          valipassthru();
        }
        else{
          $('.emsg_passowrd').html('密碼請大於6個字元');
          $('#subButton').prop('disabled', true);
          password_vali = false;
        }
      });
      $('#password_confirmation').on('keyup', function(){
        if($(this).val() == $('#password').val()){
         $('.emsg_password_confirmation').html(' ');
         password_confirmation_vali = true;
         valipassthru();
       }
       else{
        $('.emsg_password_confirmation').html('輸入的密碼不同');
        $('#subButton').prop('disabled', true);
        password_confirmation_vali = false;
      }
    });
      $('#register_mail').on('keyup', function(){
        var $validation = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if($(this).val().match($validation)){
          $('.emsg_mail').html(' ');
          $.post('register_mail_check.php',{mail:$(this).val()}, function(data){
            if(data == '1'){
              console.log(data + '-mail');
              $('.emsg_mail').html('信箱已被採用');
              $('#subButton').prop('disabled', true);
              mail_address_vali = false;
            }
            else{
              console.log(data + '-mail');
              $('.emsg_mail').html(' ');
              mail_address_vali = true;
              valipassthru();
            }
          });
        }
        else{
          $('.emsg_mail').html('你輸入的信箱格式不正確');
          $('#subButton').prop('disabled', true);
          mail_address_vali = false;
        }
      });
    </script>

  </body>

  <?php
  mysqli_close($link);
  ?>
  </html>
