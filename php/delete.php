<?php 
session_start();
if (empty($_POST['id']) || empty($_SESSION['accountID'])) {
    exit();
} else {
    include('../config/config.php');
    $accountID = $_POST['id'];
    $managerID = $_SESSION['accountID'];
    $sql = "DELETE FROM useraccounts where accountID = '$accountID' AND managerID = '$managerID' ";
    $conn = connectSql();
    $result = $conn->query($sql);
    header('Location: ../index.php');
    exit();
    // echo $accountID;
    // echo "<br>";
    // echo "$managerID";


}
?>