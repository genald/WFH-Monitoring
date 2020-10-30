<?php
    //Set Access-Control-Allow-Origin with PHP
    header('Access-Control-Allow-Origin: http://localhost/', false);
    $data = $_POST['screen-capture'];
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    file_put_contents('img/screen_captures/image.png', $data);

?>