<?php
    include('inc/functions.php');
 
    if (isset($_POST["btnDeleteAcc"])) 
    {
        unset($_POST["btnDeleteAcc"]);

        // Code that only executes when submit is pressed
        deleteAcc();

        header("Refresh:0");
    }

    $msg = "";
    $db = mysqli_connect("localhost", "root", "", "pixel_trading");
    // If upload button is clicked ...
    if (isset($_POST['upload'])) {
  
      $filename = $_FILES["image-input"]["name"];
      $tempname = $_FILES["image-input"]["tmp_name"];   
          $folder = "upload/".$filename;
          
      
  
          // Get all the submitted data from the form
          $sql = "INSERT INTO upload (filename) VALUES ('$filename')";
  
          // Execute query
          mysqli_query($db, $sql);
          
          // Now let's move the uploaded image into the folder: image
          if (move_uploaded_file($tempname, $folder))  {
              $msg = "Image uploaded successfully";
          }else{
              $msg = "Failed to upload image";
        }
    }
    $result = mysqli_query($db, "SELECT * FROM upload");

?>
<script>
  function performClick(elemId) {
    var elem = document.getElementById(elemId);
    if(elem && document.createEvent) {
       var evt = document.createEvent("MouseEvents");
       evt.initEvent("click", true, false);
       elem.dispatchEvent(evt);
    }
}
function openForm() {
  document.getElementById("myForm").style.display = "block"
  event.preventDefault();
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

  

</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <h1 class="page-header">Profile</h1>
    
    <?php
    pop_up_password();
    ?>
    <div class="Settings">

      <div class="Information">
        <h2>Information</h2> 
        <!-- iemand die back end doet moet even zorgen dat de correcte text hier komt te staan -Stan -->
        <h4>E-mail</h4>
        <h4>Password</h4>
        <h4>Account Age</h4>
        <h2>Settings</h2>

        <div class="profile">
        <h2>Change Profile Picture</h2>
        <a href="#" onclick="performClick('image-input');">
            <img id="profilepic" onmouseover="this.src='images/hover-pfp.png'" onmouseout="this.src='images/blank-profile-picture-973460_1280.png'" src="images/blank-profile-picture-973460_1280.png" width="255" height="255">
        </a>
        
        </div>

        <form method="POST" action="profile.php">

          <input class="btnPfPage" type="submit" name="btnChangePass" value="Change Password" onclick="openForm()">
          <input class="btnPfPage" type="submit" name="btnDeleteAcc" value="Delete Account" onclick="Delete()">
          <input type="file" id="image-input" accept="image/jpeg, image/png, image/jpg">

        </form>

      </div>
    </div>
</body>
</html>

