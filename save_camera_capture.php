<?php
    //Set Access-Control-Allow-Origin with PHP
    header('Access-Control-Allow-Origin: http://localhost/', false);
    $data = $_POST['camera-capture'];
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);
    session_start();
    // date_timezone_set("Asia/Manila");
    date_default_timezone_set('Asia/Manila');
    $imageFile = date("h-ia") . ".png";
    $imageDirectory = 'employees/' . $_SESSION['accountID'] . "/" . date('Y-m-d') . "/" .$imageFile;
    file_put_contents($imageDirectory, $data);

?>