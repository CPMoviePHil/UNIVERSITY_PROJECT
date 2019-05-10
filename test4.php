<?php

	$username = 0424002;
    $md5_code = md5(md5(base64_encode(rand(1,100).'pulser'.$username.'jhddc12'))).base64_encode($username);
    var_dump($md5_code);

?>