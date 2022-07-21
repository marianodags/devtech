<?php 
include 'config.php';

?>
<?php 

session_start();

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
    <title>Update</title>
  </head>

  <body>
      <br><br>
      
    <center>
      
      <div class="container">
          
          <h2>UPDATE PROFILE</h2>
      <form class="login-email" action="" method="post">

          

          	<div class="input-group">
          <input type="text" placeholder="SEARCH-USERS-ID" name="id" value="" required>
          </div>
          <div class="input-group">
          <input type="text" placeholder="Username" name="username" value=""required>
          </div>
          <div class="input-group">
          	<input type="email" placeholder="Email" name="email" value=""required>
          	</div>
          	<div class="input-group">
          	<input type="text" placeholder="Student ID" name="id_student" value=""required>
          	</div>
          	<div class="input-group">
          	<input type="text" placeholder="First Name" name="given_name" value=""required>
          	</div>
          	<div class="input-group">
          	<input type="text" placeholder="Last Name" name="family_name" value=""required>
            </div>



    <br><br>


        <input type="submit" class="btn btn-dark" name="update" value="UPDATE DATA"><br><br>
        <a href="admin.php"><button class="btn btn-dark" type="button" name="button">BACK</button></a>
      </form>
      </div>


    </center>

<?php
$connection=mysqli_connect("localhost","id17316003_devtechincorp","L2BDbaSPI\B!Y/jy");
$db=mysqli_select_db($connection,"id17316003_registereddatas");

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $query = "UPDATE `users` SET username ='$_POST[username]',email='$_POST[email]',id_student='$_POST[id_student]',
    given_name='$_POST[given_name]',family_name='$_POST[family_name]' WHERE id='$id'";
    $result = mysqli_query($connection, $query);
        
        
    $query_run = mysqli_query($connection,$query);
        
    if($query_run){
        echo '<script type="text/javascript">alert("DATA UPDATED") </script>';
                      
    }else {
           echo '<script type="text/javascript">alert("NOT UPDATED") </script>';
                      
    }
        
        
}


 ?>
 



<br><br><br><br>
  </body>
</html>
