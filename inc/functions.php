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
    <div class="navbar">

        <a href="index.php">Home</a>
        <a href="">About</a>
        <a href="Contact">Contact</a>

        <div class="dropdown">
          <button class="dropbtn">Categories
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <div class="header">
              <h2>Mega Menu</h2>
            </div>
            <div class="row">
              <div class="column">
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley"> <h3>NFT</h3></a>
              </div>
              <div class="column">
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley"><h3>Electronics</h3></a>
              </div>
              <div class="column">
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley"><h3>Pokemon Cards</h3></a>
              </div>
            </div>
          </div>
        </div>
        <?php
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            ?>
            <a href="logout.php">Logout</a>
            <img href="profile.php"id="logo" src="images/pixel trading.png">
            <?php
        }
        else{
            ?>
            
            <a href="Login.php">Login</a>
            <a href="create_acc.php">Make Account</a>
            <?php
        }
        ?> 
      </div>
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