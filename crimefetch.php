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


$sql = "SELECT * FROM `crime info`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);



?>


   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIME INFORMATION</title>
    <link rel="stylesheet" href="table.css">
   </head>
   <body>
    <table aling="center" >
        <h2>CRIME INFORMATION</h2>
        <tr>
            <th>CRIME ID</th>
            <th>CRIME NAME</th>
            <th>IPC SECTION</th>
            <th>Operation</th>
        </tr>
        
            
        <?php
            if ($num > 0){
            while($row = mysqli_fetch_assoc($result)){
              ?> 
               <tr class="op">
               <td><?php echo  $row['crimeid'] ;?></td>
               <td><?php echo  $row['crimename'] ;?></td>
               <td><?php echo  $row['ipcsection'] ;?></td>
               <td>
                <button class="update"><a href="updatecrime.php?updateid=<?php echo  $row['crimeid'] ?>" style="text-decoration: none;">UPDATE</a></button>
                <button class="delete"><a href="deletecrime.php?deleteid=<?php echo  $row['crimeid'] ?>" style="text-decoration: none;">DELETE</a></button>
               </td>
              
               </tr>
     <?php    
            }
        }
        ?>          
            
            <button class="adding"><a href="crime.php">ADD CRIME</a></button>
            <button class="adding" id="database" style="left:200px"><a href="select.html">DATABASE</a></button>

        
    </table>
    
   </body>
   </html>
