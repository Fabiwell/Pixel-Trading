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










?>