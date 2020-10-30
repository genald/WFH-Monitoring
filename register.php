<?php
include('config/config.php');
$username = "adrian";
$hashed_password = password_hash("wfhPassword", PASSWORD_DEFAULT);
$sql = "INSERT INTO useraccounts (accountID, name, password, role) VALUES ('Aeighy', 'Adrian', '$hashed_password', 0)";
$conn = connectSql();
    $result = $conn->query($sql);
    $conn->close();
?>