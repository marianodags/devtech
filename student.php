<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>HOME</title>
</head>

</style>
<body>
    <center>
        
    <br><br><br>
    <img src="devtech.png" alt="">
    <?php echo "<h3  class=\"neon\">WELCOME TO ONLINE FEEDBACK SYSTEM <br>" . $_SESSION['username'] . "</h3>"; ?>
    
<br><br><br>
    
     <a href="profile.php"><button class="profile_button" type="button" name="button"><span class="profile-text">PROFILE</span></button></a>
    <a href="usermessage.php"><button class="suggestion_button" type="button" name="button"><span class="suggestion-text">SUGGESTION</span></button></a>
      <a href="logout.php"><button class="logout_button" type="button" name="button"><span class="logout-text">LOGOUT</span></button></a>

</center>
<br><br>

</body>
</html>
