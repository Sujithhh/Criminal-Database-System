<?php
  
  
  $server = "localhost";
  $user_name="root";
  $password="";
  $con = mysqli_connect($server, $user_name,$password);
  if (!$con){
    die("connection to this database is failed due to ".mysqli_connect_error);
} 
$Criminal =$_POST['Criminal_ID'];
$Penalty = $_POST['Penalty'];
$Imprisonment = $_POST['Imprisonment'];
$Judgement =$_POST['Judgement_Date'];


$sql = "INSERT INTO `crimininal database`.`punishment` (`Criminal_ID`, `Penalty`, `Imprisonment`, `Judgement_Date`) VALUES ($Criminal , '$Penalty', '$Imprisonment', '$Judgement')";
   echo $sql;
 
 
 if ($con->query($sql)==true){
   --  $insert=true;
   -- echo "successfully inserted";
}
else{
   echo "ERROR: $sql <br> $con->error";
   echo "<br> op madan";
} 
$con->close();
}

?>
