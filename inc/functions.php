<?php
function db(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $data = "pixel_trading";

    $mysqli = new mysqli($host, $user, $pass, $data);

    if ($mysqli->connect_error) 
    {
        echo "Connection failed: " . $mysqli-> connect_error;
    }
    
    return $mysqli;
}
function log_in(){
    $conn = db();

    if(!isset($_SESSION['loggedIn'])){
        $_SESSION['loggedIn'] = false;
    }

    extract($_POST);

    $sql = 'SELECT `email`, `password` FROM `account`';

    $results = $conn->query($sql);

    while($row = $results->fetch_assoc())
    {
        if($row['email'] == $logmail && $row['password'] == hash('sha1', $logpass))
        {
            $_SESSION['loggedIn'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            header('Location: index.php');
            break;
        }
    }
}










?>