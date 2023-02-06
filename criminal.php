<?php
  $insert=false;
  if (isset($_POST['User'])){
  $server = "localhost";
  $user_name="root";
  $password="";
  $con = mysqli_connect($server, $user_name,$password);
  if (!$con){
    die("connection to this database is failed due to ".mysqli_connect_error);
} 
$User_id = $_POST['User'];
$Criminal_id  = $_POST['Criminal'];
$Criminal_name = $_POST['Criminaln'];
$Crime_id = $_POST['Crime'];
$reporting_date = $_POST['reportingd'];



$sql = "INSERT INTO `crimininal database`.`criminal details` (`User_id`, `Criminal_id`, `Criminal_name`, `Crime_id`, `reporting_date`) VALUES ('$User_id', '$Criminal_id ', '$Criminal_name', '$Crime_id', '$reporting_date');";
// echo $sql;
 
 
 if ($con->query($sql)==true){
    // $insert=true;
    header('location:criminalfetch.php');
}
else{
   header('location:criminal.php');
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
        <div class="text">ADDING CRIMINAL DATA</div>
        <form action="criminal.php" method="post">
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="User" id="User" required>
               <div class="underline"></div>
               <label for="">User ID</label>
            </div>
            <div class="input-data">
               <input type="text" name="Criminal" id="Criminal" required>
               <div class="underline"></div>
               <label for="">Criminal ID</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="Criminaln" id="Criminaln" required>
               <div class="underline"></div>
               <label for="">Criminal Name</label>
            </div>
            <div class="input-data">
               <input type="text" name="Crime" id="Crime" required>
               <div class="underline"></div>
               <label for="">Crime ID</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data textarea">
              <input type="date" name="reportingd" id="reportingd">
               <br />
               <div class="underline"></div>
               <label for="">Reporting date</label>
               <br />
               <div class="form-row submit-btn">
                  <div class="input-data">
                     <div class="inner"></div>
                     <input type="submit" value="submit">
                  </div>
               </div>
            </div>
         </div>
        </form>
     </div>
     <button class="adding"  style="bottom: 5px; right:450px"><a href="criminalfetch.php">VEIW TABLE</a></button>
   </body>
</html>