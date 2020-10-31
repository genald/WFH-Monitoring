<?php
include('config/config.php');
$username = "Aeighy3";
$name = "de Torres, Core";
$hashed_password = password_hash("wfhPassword", PASSWORD_DEFAULT);
$sql = "INSERT INTO useraccounts (accountID, name, password, role, managerID) VALUES ('$username', '$name', '$hashed_password', 0, 'adrian-manager')";
$conn = connectSql();
$result = $conn->query($sql);
$conn->close();

$imageDirectory = 'employees/' . $username . date('Y-m-d');
    if (!file_exists($imageDirectory)) {
        mkdir($imageDirectory, 0777, true);
    }
?>