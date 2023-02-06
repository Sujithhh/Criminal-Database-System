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


$sql = "SELECT * FROM `punishment` WHERE `Criminal_ID`=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$penalty=$row['Penalty'];
$imprisionment=$row['Imprisonment'];
$jdate=$row['Judgement_Date'];

if (isset($_POST['Criminal'])){
    $Criminal =$_POST['Criminal'];
    $Penalty = $_POST['Penalty'];
    $Imprisonment = $_POST['Imprisonment'];
    $Judgement =$_POST['Judgement'];
    $sql1 = "UPDATE `punishment` SET `Criminal_ID` = $Criminal, `Penalty` = '$Penalty', `Imprisonment` = '$Imprisonment', `Judgement_Date` = '$Judgement' WHERE `punishment`.`Criminal_ID` = $id;";
    if ($conn->query($sql1)==true){
        //  $insert=true;
        // echo "successfully inserted";
        header('location:fetchpunishment.php');
    }
    else{
      header('location:fetchpunishment.php');
    } 
}
?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
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
        <form action="updatepunishment.php?updateid=<?php echo $id;?>" method="post">
           <div class="form-row">
              <div class="input-data">
                 <input type="text" name="Criminal" id="Criminal" value=<?php echo $id;?> required>
                 <div class="underline"></div>
                 <label >Criminal ID</label>
              </div>
              <div class="input-data">
                 <input type="text" name="Penalty" id="Penalty" value="<?php echo $penalty?>" required>
                 <div class="underline"></div>
                 <label >Penaltly</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="text"  name="Imprisonment" id="Imprisonment" value="<?php echo $imprisionment?>" required>
                 <div class="underline"></div>
                 <label >Imprisionment</label>
              </div>
              <div class="input-data">
                 <input type="date" name="Judgement" id="Judgement" value="<?php echo $jdate?>"  max="2100-12-31"required>
                 <div class="underline"></div>
                 <label >Judgement Date</label>
              </div>
           </div>
           <div class="form-row">
              
                 <br />
                 <div class="form-row submit-btn">
                    <div class="input-data">
                       <div class="inner"></div>
                       <input type="submit" value="Update" style="padding-right:210px; padding-left:5px;">
                    </div>
                 <!-- </div> -->
              </div>
           </div>
        </form>
     </div>
   </body>
</html>
