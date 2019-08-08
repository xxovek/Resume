<?php
session_start();
unset($_SESSION['fullname']);
unset( $_SESSION['emailid']);
unset( $_SESSION['created_at']);
unset($_SESSION['id']);

session_destroy();
header("Location:./index.php");
?>
