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
</head>
<body>
    <h1>Profile</h1>
    <div id="profilepic">
        <h2>Change Profile Picture</h2>
        <a href="#" onclick="performClick('image-input');">
            <img src="images/blank-profile-picture-973460_1280.png" width="200" height="200">
        </a>
        <input type="file" id="image-input" accept="image/jpeg, image/png, image/jpg">
    </div>
</body>
</html>

