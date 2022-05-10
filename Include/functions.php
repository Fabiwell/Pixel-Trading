<?php
session_start();

function db(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $data = "insertdata";

    $mysqli = new mysqli($host, $user, $pass, $data);

    // if($mysqli){
        
    // }
    if ($mysqli->connect_error) 
    {
        echo "Connection failed: " . $mysqli-> connect_error;
    }
    
    return $mysqli;
}   














?>