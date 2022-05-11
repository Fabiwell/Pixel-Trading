<?php

    include('inc/functions.php');

    if ($_POST && isset($_POST["submit"])) 
    {
        unset($_POST["submit"]);

        // Code that only executes when submit is pressed
        createAcc();

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
    <title>Create account</title>
</head>
<body>
    <form action="create_acc.php" method="POST">
        <input type="text" name="accFN" id="" placeholder="Firstname" required>
        <input type="text" name="accLN" id="" placeholder="Lastname" required>
        <input type="email" name="accmail" placeholder="E-Mail" required>
        <input type="password" name="accpass" placeholder="Password" required>
        <input type="submit" value="Send" name="submit">
    </form>
</body>
</html>