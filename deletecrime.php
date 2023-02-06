<?php
 
  if (isset($_GET['deleteid'])){ 
  
  $server = "localhost";
  $user_name="root";
  $password="";
  $con = mysqli_connect($server, $user_name,$password);
  if (!$con){
    die("connection to this database is failed due to ".mysqli_connect_error);
} 
$Crimeid =$_GET['deleteid'];



$sql ="DELETE FROM `crimininal database`.`crime info` WHERE `crime info`.`crimeid` = '$Crimeid'";
    // echo $sql;
    
 
  
 if ($con->query($sql)==true){
    
    //  echo "successfully inserted";
    header('location:crimefetch.php');
}
else{
   
} 
$con->close();

}
?>
