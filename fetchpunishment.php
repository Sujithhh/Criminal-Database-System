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


$sql = "SELECT * FROM `punishment`";
$result = mysqli_query($conn, $sql);




?>


   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUNISHMENT DETAILS</title>
    <link rel="stylesheet" href="table.css">
   </head>
   <body>
    <table aling="center" >
    <h2>PUNISHMENT DETAILS</h2>
        <tr>
            <th>Criminal _ID </th>
            <th>Penalty</th>
            <th>Imprisonment</th>
            <th>Judgement_Date</th>
            <th>Operation</th>
        </tr>
        
            <?php
            
            while($row = mysqli_fetch_assoc($result)){
              ?> 
               <tr class="op">
              <td><?php echo  $row['Criminal_ID'] ?></td>
               <td><?php echo  $row['Penalty'] ?></td>
               <td><?php echo  $row['Imprisonment'] ?></td>
               <td><?php echo  $row['Judgement_Date'] ?></td>
               <td>
                <button class="update"><a href="updatepunishment.php?updateid=<?php echo  $row['Criminal_ID'] ?>" style="text-decoration: none;">UPDATE</a></button>
                <button class="delete"><a href="deletepunishment.php?deleteid=<?php echo  $row['Criminal_ID'] ?>" style="text-decoration: none;">DELETE</a></button>
               </td>
               </tr>
     <?php    
            }
        
        ?>         
            
            <button class="adding"><a href="newp.php">ADD PUNISHMENT</a></button>
            <button class="adding" id="database" style="left:250px"><a href="select.html">DATABASE</a></button>
        
    </table>
    
   </body>
   </html>
