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


$sql = "SELECT * FROM `crime info` WHERE `crimeid`=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$crimename=$row['crimename'];
$ipcsection=$row['ipcsection'];
if (isset($_POST['crimename'])){
    $crimeid=$_POST['crimeid'];
    $crimename = $_POST['crimename'];
    $ipcsection = $_POST['ipcsection'];

    $sql1 = "UPDATE `crime info` SET `crimeid` = '$crimeid', `crimename` = '$crimename', `ipcsection` = '$ipcsection' WHERE `crime info`.`crimeid` = $id;";
    if ($conn->query($sql1)==true){
        //  $insert=true;
        // echo "successfully inserted";
        header('location:crimefetch.php');
    }
    else{
      header('location:crimefetch.php');
    } 
}
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Responsive Contact us Form | CodingNepal</title>
     <link rel="stylesheet" href="crime.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
    <div class="container">
        <div class="text">ADDING USER DATA</div>
        <form action="updatecrime.php?updateid=<?php echo $id;?>" method="post">
           <div class="form-row">
              <div class="input-data">
                 <input type="text" name="crimeid" id="crimeid" value="<?php echo $id?>" required>
                 <div class="underline"></div>
                 <label >Crime Id</label>
              </div>
              
              <div class="input-data">
                 <input type="text" name="crimename" id="crimename" value="<?php echo $crimename?>" required>
                 <div class="underline"></div>
                 <label >Crime name</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="text"  name="ipcsection" id="ipcsection" value="<?php echo $ipcsection?>" required>
                 <div class="underline"></div>
                 <label >IPC Section</label>
              </div>
              
           <div class="form-row">
              
                 <br />
                 <div class="form-row submit-btn">
                    <div class="input-data">
                       <div class="inner"></div>
                       <input type="submit" value="update" style="padding-right:200px; padding-left:5px;">
                    </div>
                 <!-- </div> -->
              </div>
           </div>
        </form>
     </div>
   </body>
</html>

