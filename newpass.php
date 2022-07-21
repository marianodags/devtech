<?php
include 'config.php';
session_start();

?>
<?php 



if (!isset($_SESSION['adminusername'])) {
    header("Location: admin.php");
}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>CHANGE PASSWORD</title>
  </head>

  <body>
      <br><br>

    <center>
      
        <div class="container">
    <h2>CHANGE PASSWORD</h2>

      <form class="login-email" action="" method="post">
          <div class="input-group"><input type="email" placeholder="Users-Email" name="email" value="" required></div>
          <div class="input-group"><input type="password" placeholder="OLD PASSWORD" name="oldpass" value="" required></div>
          <div class="input-group"><input type="password" placeholder="NEW PASSWORD" name="newpass" value="" required></div>
          <div class="input-group"><input type="password" placeholder="CONFIRM NEW PASSWORD" name="cnpass" value="" required></div>

            
          	
          	
          	





        <input type="submit" class="btn btn-dark" name="update" value="CHANGE"><br><br>
        <a href="admin.php"><button class="btn btn-dark" type="button" name="button">BACK</button></a>
      </form>
</div>


    </center>

<?php
$connection=mysqli_connect("localhost","id17316003_devtechincorp","L2BDbaSPI\B!Y/jy");
$db=mysqli_select_db($connection,"id17316003_registereddatas");

if(isset($_POST['update'])){


  	$email = $_POST['email'];
  	$oldpass = md5($_POST['oldpass']);
    $newpass = md5($_POST['newpass']);
  	$cnpass = md5($_POST['cnpass']);
  	
  	if($newpass == $cnpass){

    $query= mysqli_query($connection,"SELECT email , password FROM users WHERE email='$email' AND password='$oldpass'");
    $num=mysqli_fetch_array($query);

        if($num>0){
            $con=mysqli_query($connection,"UPDATE users SET  password = '$newpass' WHERE email='$email' ");
            echo "<script>alert('Wow!Password Change Successfully.')</script>";
      
        }else {
            echo "<script>alert('Password Does Not Match.')</script>";

        }
  	}else {
		echo "<script>alert('Password Not Matched.')</script>";
	}



  }






 ?>


<br><br><br><br>
  </body>
</html>
