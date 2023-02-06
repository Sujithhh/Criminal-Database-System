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


$sql = "SELECT * FROM `criminal details`";
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
    <title>CRIMINAL DETAILS</title>
    <link rel="stylesheet" href="table.css">
   </head>
   <body>
    <table aling="center" >
    <h2>CRIMINAL DETAILS</h2>
        <tr>
            <th>User Id</th>
            <th>Criminal ID</th>
            <th>Criminal Name</th>
            <th>Crime Id</th>
            <th>Reporting date</th>
            <th>Operation</th>
            
        </tr>
        
            
        <?php
            
            while($row = mysqli_fetch_assoc($result)){
              ?> 
               <tr class="op">
               <td><?php echo  $row['User_id'] ;?></td>
               <td><?php echo  $row['Criminal_id'] ;?></td>
               <td><?php echo  $row['Criminal_name'] ;?></td>
               <td><?php echo  $row['Crime_id'] ;?></td>
               <td><?php echo  $row['reporting_date'] ;?></td>
               <td>
                <button class="update"><a href="updatecriminal.php?updateid=<?php echo  $row['Criminal_id'] ?>" style="text-decoration: none;">UPDATE</a></button>
                <button class="delete"><a href="deletecriminal.php?deleteid=<?php echo  $row['Criminal_id'] ?>" style="text-decoration: none;">DELETE</a></button>
               </td>
              
               </tr>
     <?php    
            }
        
        ?>          
            
            <button class="adding"><a href="criminal.php">ADD CRIMINAL</a></button>
            <button class="adding" id="database" style="left:220px"><a href="select.html">DATABASE</a></button>

        
    </table>
    
   </body>
   </html>
