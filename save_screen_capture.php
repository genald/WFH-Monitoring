<?php
    //Set Access-Control-Allow-Origin with PHP
    header('Access-Control-Allow-Origin: http://localhost/', false);
    $data = $_POST['screen-capture'];
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    file_put_contents('img/screen_captures/image.png', $data);
    session_start();
    date_default_timezone_set('Asia/Manila');
    $imageFile = date("h-ia") . ".png";
    $imageDirectory = 'employees/' . $_SESSION['accountID'] . "/" . date('Y-m-d') . "/screencapture/";
    if (!file_exists($imageDirectory)) {
        mkdir($imageDirectory, 0777, true);
    }
    $imageDirectory = 'employees/' . $_SESSION['accountID'] . "/" . date('Y-m-d') . "/screencapture/" .$imageFile;
    file_put_contents($imageDirectory, $data);


?>