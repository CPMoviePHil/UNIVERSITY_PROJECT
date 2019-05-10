<?php
$to = 'david8759607@gmail.com';
$subject = 'Pulser 2.0 重新設置密碼';
$url = 
"<html>
<head>
<title>reset_password</title>
</head>
<body>
<a href='localhost/project/reset_password_via_mail_confirmation.php?&mail=david8759607@gmail.com'>請點閱</a>
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
?>