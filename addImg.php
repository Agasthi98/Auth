
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./CSS/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <img id="img" src="./image.png"> -->
    <div class="imageContainer">
        <video id="video" width="320" height="240" autoplay></video>
        <canvas id="canvas" width="320" height="240"></canvas>
    </div>
        
    <div>
        <input id="userID" type="number" value= "<?php echo $_GET['uid'] ?>" >
        <button id="start-camera">Start Camera</button>
        <button id="click-photo">Click Photo</button>
        <button id="upload-photo">Upload Photo</button>
    </div>
        
    <div style="margin-top: 20px;">
        <textarea name="base64" id="imgData" cols="100" rows="30"></textarea>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./JS/imgUpload.js"></script>

</html>


