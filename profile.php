<?php
    include('inc/functions.php');
 
    if (isset($_POST["btnDeleteAcc"])) 
    {
        unset($_POST["btnDeleteAcc"]);

        // Code that only executes when submit is pressed
        deleteAcc();

        header("Refresh:0");
    }

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
    <h1>Profile</h1>
    <div class="profile">
        <h2>Change Profile Picture</h2>
        <a href="#" onclick="performClick('image-input');">
            <img class="profilepic" src="images/blank-profile-picture-973460_1280.png" width="255" height="255">
        </a>
        <input type="file" id="image-input" accept="image/jpeg, image/png, image/jpg">
    </div>
    <?php
    pop_up_password();
    ?>
    <div class="Settings">

      <div class="Information">
        <h2>Information</h2> 
        <!-- iemand die back end doet moet even zorgen dat de correcte text hier komt te staan -Stan -->
        <h5>E-mail</h5>
        <h5>Password</h5>
        <h5>Account Age</h5>
        <h2>Settings</h2>

        <form method="POST" action="profile.php">

          <input class="btnPfPage" type="submit" name="btnChangePass" value="Change Password" onclick="openForm()">
          <input class="btnPfPage" type="submit" name="btnDeleteAcc" value="Delete Account" onclick="Delete()">
          <input class="btnPfPage" type="submit" name="btnChangePfp" value="Change Profile Picture">

        </form>

      </div>
    </div>
</body>
</html>

