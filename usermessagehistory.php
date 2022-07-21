<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>
<?php



include "config.php"
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
    <title>STUDENT</title>
  </head>
 



<body >
<br><br><br><br><br>
<div class="container-xl">
    
    <h2 style="text-align:center;">SUGGESTION HISTORY</h2>
    <br><br><br><br>
    <center> <a href="student.php"><button class="btn btn-dark" type="button" name="button">BACK</button></a></center>
       
        
<?php
  $currentUser = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username = '$currentUser'";
  $result2 = mysqli_query($conn, $sql);
?>
<?php
$sql = "SELECT * FROM message ";
$result = mysqli_query($conn, $sql);
if($result2){

if ($result->num_rows > 0) {
    $row2 = mysqli_fetch_array($result2);
    $newid=$row2['id'];

    // output data of each row

  
    while($row = $result->fetch_assoc()) {
          if($newid==$row["user"]){
              
             echo "
             
                 <div >
                 

      <article id=\"blogs\" class=\"media content-section q\">

             <div class=\"media-body q\">
               <div class=\"article-metadata q\">
               

                 <a style=\"color:white;\"  class=\"mr-2\" href=\"profile.php\"> $currentUser </a><br>
                 <small  style=\"color:white;\"  class=\"text-muted\"> ".$row["m_date"]."</small>
                 <span><a href='deletemessage.php?del=".$row['id_message']."'>DELETE</a></span>
               </div>
               <p style=\"color:white;\"  class=\"article-content\"> ".$row["message"]." </p>
             </div>
           </article>
             <br>


    </div>
             
             ";} 
          } 

} else {
    echo "0 results";
}
}


  ?>
<br>
<center>


</center>

<br><br><br>
</div>

  </body>
</html>
