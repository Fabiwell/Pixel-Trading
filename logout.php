<?php
    session_start();
    //log out and clear variables
    $_POST = [];
    unset($_SESSION);
    session_destroy();
    header("Location: index.php");

?>