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


$sql = "SELECT * FROM `trigger_table`";
$result = mysqli_query($conn, $sql);



?>


   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUNISHMENT MODIFIED DETAILS</title>
    <link rel="stylesheet" href="table.css">
   </head>
   <body>
    <table aling="center" ">
    <h2>USER INFORMATION TABLE</h2>
        <tr>
            <th>SL NO.</th>
            <th>CRIMINAL ID</th>
            <th>MODIFIED DATE</th>
            
        </tr>
        
            <?php
             while($row = mysqli_fetch_assoc($result)){
              ?> 
               <tr class="op">
              <td><?php echo  $row['sl_no'] ?></td>
               <td><?php echo  $row['Criminal_id'] ?></td>
               <td><?php echo  $row['modified_date'] ?></td>
               </tr>
     <?php    
            }
        
        ?>         
            
    <button class="adding"><a href="select.html">DATABASE</a></button>


        
    </table>
    
   </body>
   </html>
