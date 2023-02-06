<?php
$insert=false;
if (isset($_POST['Criminal'])){
  $server = "localhost";
  $user_name="root";
  $password="";
  $con = mysqli_connect($server, $user_name,$password);
  if (!$con){
    die("connection to this database is failed due to ".mysqli_connect_error);
} 
$Criminal =$_POST['Criminal'];
$Penalty = $_POST['Penalty'];
$Imprisonment = $_POST['Imprisonment'];
$Judgement =$_POST['Judgement'];


$sql = "INSERT INTO `crimininal database`.`punishment` (`Criminal_ID`, `Penalty`, `Imprisonment`, `Judgement_Date`) VALUES ($Criminal , '$Penalty', '$Imprisonment', '$Judgement')";
//    echo $sql;
 
 
 if ($con->query($sql)==true){
    //  $insert=true;
    header('location:fetchpunishment.php');
}
else{
   header('location:newp.php');  
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
        <div class="text">ADDING PUNISHMENT DETAILS</div>
        <form action="newp.php" method="post">
           <div class="form-row">
              <div class="input-data">
                 <input type="text" name="Criminal" id="Criminal" required>
                 <div class="underline"></div>
                 <label >Criminal ID</label>
              </div>
              <div class="input-data">
                 <input type="text" name="Penalty" id="Penalty" required>
                 <div class="underline"></div>
                 <label >Penaltly</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="text"  name="Imprisonment" id="Imprisonment" required>
                 <div class="underline"></div>
                 <label >Imprisionment</label>
              </div>
              <div class="input-data">
                 <input type="date" name="Judgement" id="Judgement" required>
                 <div class="underline"></div>
                 <label >Judgement Date</label>
              </div>
           </div>
           <div class="form-row">
              <!-- <div class="input-data textarea">
                 <textarea rows="8" cols="80" required></textarea>
                 <br />
                 <div class="underline"></div>
                 <label for="">Write your message</label> -->
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
     <button class="adding"><a href="fetchpunishment.php">VEIW TABLE</a></button>
   </body>
</html>
<!-- INSERT INTO `user details` (`user_id`, `fname`, `lname`, `email`) VALUES ('1021', 'Ashok', 'Kumar', 'ashokkumar@gmail.com'); -->
