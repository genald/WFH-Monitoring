<?php
    session_start();
    unset($_SESSION['role']);
    unset($_SESSION['accountID']);
    session_destroy();
    header('Location: ../login.php');
    exit();
?>