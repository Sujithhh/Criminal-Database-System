<?php
 
  if (isset($_GET['deleteid'])){ 
  
  $server = "localhost";
  $user_name="root";
  $password="";
  $con = mysqli_connect($server, $user_name,$password);
  if (!$con){
    die("connection to this database is failed due to ".mysqli_connect_error);
} 
$Criminalid =$_GET['deleteid'];



$sql ="DELETE FROM `crimininal database`.`punishment` WHERE `punishment`.`Criminal_ID` = '$Criminalid'";
//    echo $sql;
 
  
 if ($con->query($sql)==true){
    
      header('location:fetchpunishment.php');
}
else{
    echo "ERROR: $sql <br> $con->error";

} 
$con->close();
}
?>
