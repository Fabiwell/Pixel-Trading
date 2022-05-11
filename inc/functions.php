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

//////////
//Log In//
//////////
function log_in(){
    $conn = db();

    extract($_POST);

    $sql = 'SELECT `email`, `password`, `id` FROM `account`';

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
            $_SESSION['id'] = $row['id'];
            header('Location: index.php');
            break;
        }
    }
}

///////////
//Nav Bar//
//////////
function navBar(){
    ?>
    <div class="pixelnav"> <!-- nav -->
        <div class="pixelnavs"><a href="index.php">Home</a></div>
        <div class="pixelnavs"><a href="">...</a></div>
        <?php
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            ?>
            <div class="pixelnavs"><a href="profile.php">Profile</a></div>
            <div class="pixelnavs"><a href="logout.php">Logout</a></div>
            <?php
        }
        ?>
        <div class="pixellogo"> <img src="images/pixel trading.png"></div>
    </div>
    <?php
}

////////////////
//make Account//
////////////////
function createAcc(){
    $conn = db();
    
    extract($_POST);

    $password = hash('sha1', $accpass);
    $money = 100;
    $date = (new DateTime('now'))->format('Y-m-d H:i:s');
    $sql = "INSERT INTO `account`(`id`, `firstname`, `lastname`, `email`, `password`, `date_time`, `currency`) 
            VALUES ('null','$accFN','$accLN','$accmail', '$password', '$date', '$money')";

    //if(mysqli_query($conn, $sql)){}
    $results = $conn->query($sql);
    header('Location: index.php');
}

////////////////
//Wallet Check//
////////////////
function wallet(){
    $conn = db();

    extract($_POST);
    
}
//////////////////
//Delete Account//
//////////////////
function deleteAcc(){
    $conn = db();

    $id = $_SESSION['id'];
    $sql = "DELETE FROM `account` WHERE id = $id";

    $result = $conn->query($sql);
    header('Location: logout.php');
}








?>