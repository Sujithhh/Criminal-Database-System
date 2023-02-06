<?php
  $insert=false;
  if (isset($_POST['crimeid'])){
  
  $server = "localhost";
  $user_name="root";
  $password="";
  $con = mysqli_connect($server, $user_name,$password);
  if (!$con){
    die("connection to this database is failed due to ".mysqli_connect_error);
} 
$crimeid=$_POST['crimeid'];
$crimename = $_POST['crimename'];
$ipcsection = $_POST['ipcsection'];



$sql = "INSERT INTO `crimininal database`.`crime info` (`crimeid`, `crimename`, `ipcsection`) VALUES ('$crimeid', '$crimename', '$ipcsection')";
//echo $sql;
 
 
 if ($con->query($sql)==true){
    $insert=true;
    header('location:crimefetch.php');
}
else{
   header('location:crime.php');
} 
$con->close();
 
  }
?>


<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Responsive Contact us Form | CodingNepal</title>
      <link rel="stylesheet" href="user.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
    <div class="container">
        <div class="text">ADDING USER DATA</div>
        <form action="crime.php" method="post">
           <div class="form-row">
              <div class="input-data">
                 <input type="text" name="crimeid" id="crimeid" required>
                 <div class="underline"></div>
                 <label >Crime Id</label>
              </div>
              
              <div class="input-data">
                 <input type="text" name="crimename" id="crimename" required>
                 <div class="underline"></div>
                 <label >Crime name</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="text"  name="ipcsection" id="ipcsection" required>
                 <div class="underline"></div>
                 <label >IPC Section</label>
              </div>
              
           <div class="form-row">
              
                 <br />
                 <div class="form-row submit-btn">
                    <div class="input-data">
                       <div class="inner"></div>
                       <input type="submit" value="submit" style="padding-right:200px; padding-left:5px;">
                    </div>
                 <!-- </div> -->
              </div>
           </div>
        </form>
     </div>
     <button class="adding" style="right:840px;"><a href="crimefetch.php">VEIW TABLE</a></button>
   </body>
</html>

