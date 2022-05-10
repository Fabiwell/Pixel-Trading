<?php
session_start();


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

    extract($_POST);

    $sql = 'SELECT `email`, `password` FROM `account`';

    $results = $conn->query($sql);

    if(!isset($_SESSION['loggedIn'])){
        $_SESSION['loggedIn'] = false;
    }


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
function navBar(){
    ?>
    <div class="pixelnav"> <!-- nav -->
        <div class="pixelnavs"><a href="index.php">Home</a></div>
        <div class="pixelnavs"><a href="">...</a></div>
        <div class="pixelnavs"><a href="profile.php">Profile</a></div>
        <?php
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            ?>
            <div class="pixelnavs"><a href="logout.php">Logout</a></div>
            <?php
        }
        ?>
        <div class="pixellogo"> <img src="images/pixel trading.png"></div>
    </div>
    <?php
}










?>