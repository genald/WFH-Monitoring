<?php
    //Set Access-Control-Allow-Origin with PHP
    header('Access-Control-Allow-Origin: http://localhost/', false);
    $data = $_POST['camera-capture'];
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    file_put_contents('img/camera_captures/image.png', $data);

?>