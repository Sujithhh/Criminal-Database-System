<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "crimininal database";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


$sql = "SELECT * FROM `user details`";
$result = mysqli_query($conn, $sql);



?>


   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER INFORMATION</title>
    <link rel="stylesheet" href="table.css">
   </head>
   <body>
    <table aling="center" ">
    <h2>USER INFORMATION TABLE</h2>
        <tr>
            <th>USER ID</th>
            <th>USER NAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>Operation</th>
        </tr>
        
            <?php
             while($row = mysqli_fetch_assoc($result)){
              ?> 
               <tr class="op">
              <td><?php echo  $row['user_id'] ?></td>
               <td><?php echo  $row['user_name'] ?></td>
               <td><?php echo  $row['email'] ?></td>
               <td><?php echo  $row['password'] ?></td>
               <td>
                <button class="update"><a href="updateuser.php?updateid=<?php echo  $row['user_id'] ?>" style="text-decoration: none;">UPDATE</a></button>
                <button class="delete"><a href="deleteuser.php?deleteid=<?php echo  $row['user_id'] ?>" style="text-decoration: none;">DELETE</a></button>
               </td>
               </tr>
     <?php    
            }
        
        ?>         
            
    <button class="adding"><a href="user.php">ADD USER</a></button>
    <button class="adding" id="database" style="left:175px"><a href="select.html">DATABASE</a></button>

        
    </table>
    
   </body>
   </html>
