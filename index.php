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


    <div class="pixelproductmain">
            
    </div>

    
    <?php
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        navBar();
        ?>
        
        <?php
    }
    else{
        navBar();
        ?> 
        

        

        <?php
    }
    ?>
<h1>Trade better with Pixel-Trading</h1>
<h2>Discover how our categories and search engine help you find beautiful and exciting products, in less time.</h2>
<h3>With our innovative system you can keep track of the prices of thing u wanted with our wishlist</h3>
<h3>Just make an account and you will be able to track unlimited products from sellers on our site<h3>
</body>
</html>
