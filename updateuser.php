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


$sql = "SELECT * FROM `user details` WHERE `user_id`=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$email=$row['email'];
$username=$row['user_name'];
$password=$row['password'];
if (isset($_POST['userid'])){
    $userid=$_POST['userid'];
    $email = $_POST['email'];
    $username = $_POST['user_name'];
    $password =$_POST['password'];
    $sql1 = "UPDATE `user details` SET `user_id` = '$userid', `email` = '$email', `user_name` = '$username', `password` = '$password' WHERE `user details`.`user_id` = $id;";
    if ($conn->query($sql1)==true){
        //  $insert=true;
        // echo "successfully inserted";
        header('location:fetch.php');
    }
    else{
      header('location:fetch.php');
       
    } 
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
        <form action="updateuser.php?updateid=<?php echo $id;?>" method="post">
           <div class="form-row">
              <div class="input-data">
                 <input type="text" name="userid" id="userid" value="<?php echo $id;?>" required>
                 <div class="underline"></div>
                 <label >USER ID</label>
              </div>
              <div class="input-data">
                 <input type="text" name="user_name" id="user_name" value="<?php echo $username;?>" required>
                 <div class="underline"></div>
                 <label >USER NAME</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="text"  name="email" id="email" value="<?php echo $email;?>" required>
                 <div class="underline"></div>
                 <label >EMAIL</label>
              </div>
              <div class="input-data">
                 <input type="text" name="password" id="password" value="<?php echo $password;?>" required>
                 <div class="underline"></div>
                 <label >PASSWORD</label>
              </div>
           </div>
           <div class="form-row">
              
                 <br />
                 <div class="form-row submit-btn">
                    <div class="input-data">
                       <div class="inner"></div>
                       <input type="submit" value="UPDATE" style="padding-right:200px; padding-left:5px;">
                    </div>
                 <!-- </div> -->
              </div>
           </div>
        </form>
     </div>
   </body>
</html>