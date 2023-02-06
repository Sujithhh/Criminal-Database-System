<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form </title>
	<link rel="stylesheet" href="demo.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body style="background: #096fb936;">
	<center><br><br>
	<div class="wrapper" >
    <header>Login Form</header>
    <form action="" method="post">
      <div class="field email">
        <div class="input-area">
          <input type="text" name="emaill" placeholder="Email Address">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password"  name="passwordd" placeholder="Password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
     
      <input type="submit" name="submitt" value="Login">
    </form><br>
        </div>

	<?php

			if(isset($_POST['submitt'])){
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
                else{
                    // echo "Connection was successful<br>";
                }

                $sql = "SELECT * FROM `user details`";
                $result = mysqli_query($conn, $sql);

                // Find the number of records returned
                
				while ($row = mysqli_fetch_assoc($result)) {
					if($row['email'] == $_POST['emaill']){
						if($row['password'] == $_POST['passwordd']){
							
							header("Location: select.html");
						}
						else{
							?>
							<!-- <span>Wrong Password !!</span> -->
							<?php
						}
					}
				}

			}
		?>
	</center>
</body>
</html>
