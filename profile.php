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
    <center>   

    <img src="devtech.png" alt="">



<br><br>


  <h1>USER PROFILE</h1>
   


<?php
  $currentUser = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE username = '$currentUser'";
  $result = mysqli_query($conn, $sql);
?>
<div class="card">
   <br>
<?php
if($result){
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)) {
      echo "<table>";
      echo "<tr>";

        echo "<td id=\"r\">";
          echo "<b>ID:&nbsp&nbsp</b>";
        echo "</td>";

        echo "<td id=\"l\">";
          echo $row['id'];
        echo "</td>";


      echo "</tr>";

      echo "<tr>";

        echo "<td id=\"r\">";
          echo "<b> USERNAME:&nbsp&nbsp</b>";
        echo "</td>";

        echo "<td id=\"l\">";
          echo $row['username'];
        echo "</td>";


      echo "</tr>";

      echo "<tr>";

        echo "<td id=\"r\">";
          echo "<b> EMAIL:&nbsp&nbsp</b>";
        echo "</td>";

        echo "<td id=\"l\">";
          echo $row['email'];
        echo "</td>";


      echo "</tr>";

      echo "<tr>";

        echo "<td id=\"r\">";
          echo "<b> FIRST NAME:&nbsp&nbsp</b>";
        echo "</td>";

        echo "<td id=\"l\">";
          echo $row['given_name'];
        echo "</td>";


      echo "</tr>";

      echo "<tr>";

        echo "<td id=\"r\">";
          echo "<b> LAST NAME:&nbsp&nbsp</b>";
        echo "</td>";

        echo "<td id=\"l\">";
          echo $row['family_name'];
        echo "</td>";


      echo "</tr>";

      echo "<tr>";

        echo "<td id=\"r\">";
          echo "<b> STUDENT ID:&nbsp&nbsp</b>";
        echo "</td>";

        echo "<td id=\"l\">";
          echo $row['id_student'];
        echo "</td>";


      echo "</tr>";
      
            echo "<tr>";

        echo "<td id=\"r\">";
          echo "<b>DATE:&nbsp&nbsp</b>";
        echo "</td>";

        echo "<td id=\"l\">";
          echo $row['p_date'];
        echo "</td>";


      echo "</tr>";



      echo "</table> ";
     
    }

  }
}


       ?>

       <a href="student.php"><button class="home_button" type="button" name="button"><span class="home-text">HOME</span></button></a>
        
       
       
</div>

 </center>   

 

  </body>
</html>
