<?php
	session_start();
	if(isset($_SESSION['login-user']))
	{
		header("location: http://localhost/hacknight2c/chat");
	}

?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login / register form with materializecss</title>
    
    
    
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>

        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="container white z-depth-2">
	<ul class="tabs teal">
		<li class="tab col s3 loginselection" ><a class="white-text active" href="#login">login</a></li>
		<li class="tab col s3 registerselection"><a class="white-text" href="#register">register</a></li>
	</ul>
	<div id="login" class="col s12">
		<form class="col s12 loginform"  action="php/login.php" method="POST">
			<div class="form-container">
				<h4 class="teal-text">Hello!! Nice To See You..</h4>
				<div class="row">
					<div class="input-field col s12">
						<input id="email" name="email" type="email" class="validate">
						<label for="email">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="password" name="password" type="password" class="validate">
						<label for="password">Password</label>
					</div>
				</div>
				<br>
				<center>
					<button class="btn waves-effect waves-light teal" type="submit">Login</button>
					<br>
					<br>
					
				</center>
			</div>
		</form>
	</div>
	<div id="register" class="col s12">
		<form class="col s12 registerform">
			<div class="form-container">
				<h4 class="teal-text">Welcome</h4>
				<div class="row">
					<div class="input-field col s6">
						<input id="last_name" type="text" class="validate">
						<label for="last_name">First Name</label>
					</div>
					<div class="input-field col s6">
						<input id="last_name" type="text" class="validate">
						<label for="last_name">Last Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="email" type="email" class="validate">
						<label for="email">Email</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
						<input id="password" type="password" class="validate">
						<label for="password">Password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="password-confirm" type="password" class="validate">
						<label for="password-confirm">Password Confirmation</label>
					</div>
				</div>
				<div class="row">
					<div class="file-field input-field">
				      <div class="btn">
				        <span>Photo</span>
				        <input type="file">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>
				</div>
				<center>
					<button class="btn waves-effect waves-light teal" type="submit" name="action">Register</button>
				</center>
			</div>
		</form>
				<?php

  	//Registration php

  	//SQL Query to create 'USERS' table

  	//CREATE TABLE `chatting`.`users` ( `email` TEXT NOT NULL , `password` TEXT NOT NULL , `fname` TEXT NOT NULL , `lname` TEXT NOT NULL ) ENGINE = InnoDB COMMENT = 'This table stores info of all users';

  		if(isset($_POST['register-submit']))
  		{

  			require ("php/connect.php");

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			$email = $_POST['email'];



			if($pass1 != $pass2)
				echo "Password not matched";

			else
			{
				$query="SELECT email FROM users;";
				$result=mysql_query($query,$con);

				$flag=1;

				while($row=mysql_fetch_array($result))
				{
					if($row['email'] == $email)
					{
						$flag=0;
						echo "not valid email";
					}
						
				}
				if($flag==1)
				{
					// Uploading file to a folder starts
					$ext = $_FILES["dp"]["type"];
					$tempext = explode("/",$ext);
					$realext = $tempext[1];
					$newname = $email;
					$target = 'uploads/'.$newname.'.'.$realext;
				    if (move_uploaded_file($_FILES["dp"]["tmp_name"], $target)) {
				        echo "The file ". $newname.'.'.$realext. " has been uploaded.";
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				    // Uploading file to a folder ends
    				
					$query="INSERT INTO `users` (`email`, `password`, `fname`, `lname`,`filetype`) VALUES ('$email', '$pass1', '$fname', '$lname' , '$realext');";
					$result=mysql_query($query, $con);

				}	
				header("location : http://localhost/Chat-login");
			}
		  		}
  	?>
	</div>
</div>
    <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
