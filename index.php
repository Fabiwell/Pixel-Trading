<?php
    include('inc/functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Trading</title>
    <link rel="stylesheet" href="css/stylesheet.css"> 
</head>
<body>
    
    <?php
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        navBar();
        ?>
        
        <?php
    }
    else{
        navBar();
        ?> 
        <div class="pixelnavs"><a href="Login.php">Login</a></div>
        <div class="pixelnavs"><a href="">Make Account</a></div>
        <?php
    }
    ?>
</body>
</html>