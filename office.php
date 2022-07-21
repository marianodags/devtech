<?php
include 'config.php';
session_start();

if (!isset($_SESSION['adminusername'])) {
    header("Location: officelogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>OFFICE</title>
         <link rel="stylesheet" href="style.css">
</head>


<body>
    <div><img class="img-office" src="devtech.png" alt=""></div>
    
        
<div class="container-xl">
    <br><br><br>
    <div>
    <center>
 <?php echo "<h2 style=\"color:white;\"><br><br>Welcome " . $_SESSION['adminusername'] . "</h2><br><br>".
    "<a href=\"logout.php\"><button class=\"btn btn-dark\" type=\"button\" name=\"button\">LOGOUT</button></a>"; ?>
<br><br><br>
</center>
</div>




<?php
$sql = "SELECT * FROM message ";
$result = mysqli_query($conn, $sql);



if ($result->num_rows > 0) {


    // output data of each row


    while($row = $result->fetch_assoc()) {
        
             echo "
             
                 <div >
                 

      <article id=\"blogs\" class=\"media content-section q\">

             <div class=\"media-body q\">
               <div class=\"article-metadata q\">

                 
                 <p style=\"color:white;\"  class=\"article-content\"><b>  USER ID ".
                 
                 $row["user"] ."</b> </p>

                 
                
                 <small  style=\"color:white;\"  class=\"text-muted\">DATE & TIME ".$row["m_date"]."</small>
                 
               </div>
               <p style=\"color:white;\"  class=\"article-content\"><b> ".$row["message"]."</b> </p>
             </div>
           </article>
             <br>


    </div>
             
             ";
          } 

} else {
    echo "0 results";
}



  ?>


<br><br><br>
</div>


</body>
</html>
