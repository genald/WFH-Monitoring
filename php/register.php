<?php
include('../config/config.php');
if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])) {
    exit();
}
session_start();
$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$sql = "SELECT accountID from useraccounts where accountID = '$username' ";
        $conn = connectSql();
        $result = $conn->query($sql);
        
		if (mysqli_num_rows($result)==1) {
            $_SESSION['usernameerror'] = true;
            header('Location: ../addEmployee.php');
            $conn->close();
            exit();
        }



// $username = "Aeighy3";
// $name = "de Torres, Core";
$managerID = $_SESSION['accountID'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO useraccounts (accountID, name, password, role, managerID) VALUES ('$username', '$name', '$hashed_password', 0, '$managerID')";
$conn = connectSql();
$result = $conn->query($sql);
$conn->close();

$imageDirectory = '../employees/' . $username;
    if (!file_exists($imageDirectory)) {
        mkdir($imageDirectory, 0777, true);
        // echo $password;
        header('Location: ../index.php');
    }

?>