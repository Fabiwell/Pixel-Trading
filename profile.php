<script>
    function performClick(elemId) {
    var elem = document.getElementById(elemId);
    if(elem && document.createEvent) {
       var evt = document.createEvent("MouseEvents");
       evt.initEvent("click", true, false);
       elem.dispatchEvent(evt);
    }
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
    <div class="Settings">
        <h2>Information</h2>
        <h5>E-mail</h5>
        <h5>Password</h5>
        <h5>Account Age</h5>
        <h2>Settings</h2>
        <button id="button" type="button">Change Password</button>
        <button id="button" type="button">Delete Account</button>
        <button id="button" type="button">Change Profile Picture</button>
</div>
</body>
</html>

