<?php 

    session_start();
    unset($_SESSION['employee_login']);
    unset($_SESSION['admin_login']);
    header('location: signin.php');

?>