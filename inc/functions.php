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

    $sql = 'SELECT `email`, `password`, `id`, `currency` FROM `account`';

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
            $_SESSION['currency'] = $row['currency'];
            header('Location: index.php');
            break;
        }
    }
}

///////////
//Nav Bar//
//////////
function dropdown(){
  ?>
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
}
function navBar(){
    ?>
     <!-- nav -->
    <div class="navbar">

        <a class="navbar-content" href="index.php">Home</a>
        <a class="navbar-content" href="">About</a>
        <a class="navbar-content" href="Contact">Contact</a>

        <?php 
          dropdown();

          if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            ?>
              <a class="navbar-content" id="btnLogout" href="logout.php">Logout</a>
              <a class="navbar-content" href=""><?=$_SESSION['currency']?></a> 
              <a href="profile.php"><img href="profile.php"id="logo" src="images/pixel trading.png"></a> 
            <?php
          }
          else{
              ?>
              
              <a class="navbar-content" href="Login.php">Login</a>
              <a class="navbar-content" href="create_acc.php">Make Account</a>
              <?php
          }
        ?> 
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
///////////////////
//Pop-up password//
///////////////////
function pop_up_password(){
  ?>
  <div class="form-popup" id="pop">
    <form action="/action_page.php" class="form-container">
      <h1>Login</h1>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Old Password" name="psw" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="New Password" name="psw" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Confirm Password" name="psw" required>

      <button type="submit" class="btn">Login</button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
  </div>
<?php
}








?>