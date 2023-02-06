<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "crimininal database";
$id = $_GET['updateid'];
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


$sql = "SELECT * FROM `criminal details` WHERE `Criminal_ID`=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$User_id=$row['User_id'];
$Criminal_name=$row['Criminal_name'];
$Crime_id =$row['Crime_id'];
$reporting_date =$row['reporting_date'];
if (isset($_POST['User'])){
    $User_id = $_POST['User'];
    $Criminal_id  = $_POST['Criminal'];
    $Criminal_name = $_POST['Criminaln'];
    $Crime_id = $_POST['Crime'];
    $reporting_date = $_POST['reportingd'];
    $sql1 = "UPDATE `criminal details` SET `User_id` = '$User_id', `Criminal_id` = '$Criminal_id', `Criminal_name` = '$Criminal_name', `Crime_id` = '$Crime_id', `reporting_date` = '$reporting_date' WHERE `criminal details`.`Criminal_id` = $id";
    if ($conn->query($sql1)==true){
        //  $insert=true;
        // echo "successfully inserted";
        header('location:criminalfetch.php');
    }
    else{
      header('location:criminalfetch.php');
    } 
}
?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Responsive Contact us Form | CodingNepal</title>
     <link rel="stylesheet" href="punishment.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
    <div class="container">
        <div class="text">ADDING USER DATA</div>
        <form action="updatecriminal.php?updateid=<?php echo $id;?>" method="post">
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="User" id="User" value="<?php echo $User_id ;?>" required>
               <div class="underline"></div>
               <label for="">User ID</label>
            </div>
            <div class="input-data">
               <input type="text" name="Criminal" id="Criminal" value="<?php echo $id;?>" required>
               <div class="underline"></div>
               <label for="">Criminal ID</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="Criminaln" id="Criminaln" value="<?php echo $Criminal_name;?>" required>
               <div class="underline"></div>
               <label for="">Criminal Name</label>
            </div>
            <div class="input-data">
               <input type="text" name="Crime" id="Crime" value="<?php echo $Crime_id;?>" required>
               <div class="underline"></div>
               <label for="">Crime ID</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data textarea">
              <input type="date" name="reportingd" id="reportingd" value="<?php echo $reporting_date;?>" required>
               <br />
               <div class="underline"></div>
               <label for="">Reporting date</label>
               <br />
               <div class="form-row submit-btn">
                  <div class="input-data">
                     <div class="inner"></div>
                     <input type="submit" value="UPDATE">
                  </div>
               </div>
            </div>
         </div>
        </form>
     </div>
   </body>
</html>