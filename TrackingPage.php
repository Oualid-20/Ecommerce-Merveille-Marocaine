<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .tracking-input {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .tracking-input input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        .tracking-input input[type="button"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }
        .tracking-input input[type="button"]:hover {
            background-color: #0056b3;
        }
        #YQContainer {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
        <?php  if (isset($_SESSION["nTracking"])){ echo $_SESSION["nTracking"] ;unset($_SESSION["nTracking"]);} ?>  
    <h1>Track Your Order</h1>
    <div class="tracking-input">
        <input type="text" id="YQNum" maxlength="50" placeholder="Enter your tracking number" />
        <input type="button" value="TRACK" onclick="doTrack()" />
    </div>
    <div id="YQContainer"></div>
</div>

<script type="text/javascript" src="//www.17track.net/externalcall.js"></script>
<script type="text/javascript">
    function doTrack() {
        var num = document.getElementById("YQNum").value;
        if(num === ""){
            alert("Please enter your tracking number."); 
            return;
        }
        YQV5.trackSingle({
            YQ_ContainerId: "YQContainer",
            YQ_Height: 560,
            YQ_Fc: "0",
            YQ_Lang: "en",
            YQ_Num: num
        });
    }
</script>

</body>
</html>
