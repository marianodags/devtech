<?php 

$server = "localhost";
$user = "id17316003_devtechincorp";
$pass = "L2BDbaSPI\B!Y/jy";
$database = "id17316003_registereddatas";



$conn = mysqli_connect($server, $user, $pass, $database);


if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>