<?php
include 'config.php';

?>
<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
    <title>SUGGESTIONS</title>
  </head>


  <body>
      
      
<div class="container num">
  <center class="message-title">
     <h2 >SUGGESTION</h2>
    <form   method="post">
        
          <textarea   name="comment" rows="6" cols="50" placeholder="Comment your suggections here..." required></textarea><br><br><br><br>

      <!--<input type="submit" name="update" value="SUBMIT"><br><br>-->
      

      <button class="btn btn-dark" type="submit" name="update"><span class="submit-text">SUBMIT</span></button><br><br>
    </form>

    <a href="student.php"><button class="btn btn-dark" type="button" name="button"><span class="back-text">BACK</span></button></a>
    <a href="usermessagehistory.php"><button class="btn btn-dark" type="button" name="button"><span class="historymessage-text">HISTORY</span></button></a>
    

  </center>

</div>

<?php
  $currentUser = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username = '$currentUser'";
  $result = mysqli_query($conn, $sql);
?>


<?php

if(isset($_POST['update'])){
    $message=$_POST['comment'];

    if($result){
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        $newid=$row['id'];
        $sql = "INSERT INTO message (user,message)VALUES ($newid, '$message')";
		$result2 = mysqli_query($conn, $sql);
		
		if ($result2) {
		    echo "<meta http-equiv='refresh' content='0;url=usermessagehistory.php'>";
		} else {
		    echo "<script>alert('Woops! No Post for today.')</script>";
        
        echo $row['id'];
        }
      
    }
    }   
}
 ?>



<br><br><br><br>
  </body>
</html>
