<?php

    include('inc/functions.php');

    if ($_POST && isset($_POST["submit"])) 
    {
        unset($_POST["submit"]);
    
        // Code that only executes when submit is pressed
        log_in();

        // echo "bobo";
        header("Refresh:0");
    }
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Richard Vullings">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="email" name="logmail" placeholder="E-Mail" id="email">
        <input type="password" name="logpass" id="password" placeholder="Password">
        <input type="submit" value="Send" name="submit">
    </form>
</body>
</html>
