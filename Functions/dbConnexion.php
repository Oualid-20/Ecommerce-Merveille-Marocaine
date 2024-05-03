<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "msk";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn) {
  die("<div class='alert alert-danger' role='alert'>
             Connection failed:
       </div> " . mysqli_connect_error());
}
/*echo "<div class='alert alert-success' role='alert'>
        Connected successfully </div>";*/
?>