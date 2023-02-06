<?php

 if (isset($_GET['deleteid'])){ 
  
  $server = "localhost";
  $user_name="root";
  $password="";
  $con = mysqli_connect($server, $user_name,$password);
  if (!$con){
    die("connection to this database is failed due to ".mysqli_connect_error);
} 
$userid =$_GET['deleteid'];



$sql ="DELETE FROM `crimininal database`.`user details` WHERE `user details`.`user_id` = '$userid'";
//    echo $sql;
 
  
 if ($con->query($sql)==true){
   header('location:fetch.php');
}
else{
    echo "ERROR: $sql <br> $con->error";

} 
$con->close();
}
?>
