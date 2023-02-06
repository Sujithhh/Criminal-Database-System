<?php
  
  $insert=false;
  if (isset($_POST['userid'])){
  $server = "localhost";
  $user_name="root";
  $password="";
  $con = mysqli_connect($server, $user_name,$password);
  if (!$con){
    die("connection to this database is failed due to ".mysqli_connect_error);
} 
$userid=$_POST['userid'];
$fname = $_POST['email'];
$lname = $_POST['user_name'];
$email =$_POST['password'];


$sql = "INSERT INTO `crimininal database`.`user details` (`user_id`, `email`, `user_name`, `password`) VALUES('$userid','$fname', '$lname', '$email')";
  // echo $sql;
 
 
 if ($con->query($sql)==true){
    $insert=true;
    header('location:fetch.php');
}
else{
   header('location:user.php');
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
        <div class="text">ADDING USER DATA</div>
        <form action="user.php" method="post">
           <div class="form-row">
              <div class="input-data">
                 <input type="text" name="userid" id="userid" required>
                 <div class="underline"></div>
                 <label >USER ID</label>
              </div>
              <div class="input-data">
                 <input type="text" name="user_name" id="user_name" required>
                 <div class="underline"></div>
                 <label >USER NAME</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="text"  name="email" id="email" required>
                 <div class="underline"></div>
                 <label >EMAIL</label>
              </div>
              <div class="input-data">
                 <input type="text" name="password" id="password"required>
                 <div class="underline"></div>
                 <label >PASSWORD</label>
              </div>
           </div>
           <div class="form-row">
              
                 <br />
                 <div class="form-row submit-btn">
                    <div class="input-data">
                       <div class="inner"></div>
                       <input type="submit" value="SUBMIT" style="padding-right:200px; padding-left:5px;">
                    </div>
                 <!-- </div> -->
              </div>
           </div>
        </form>
     </div>
     <button class="adding"><a href="fetch.php">VEIW TABLE</a></button>
    
   </body>
</html>
<!-- INSERT INTO `user details` (`user_id`, `fname`, `lname`, `email`) VALUES ('1021', 'Ashok', 'Kumar', 'ashokkumar@gmail.com'); -->




