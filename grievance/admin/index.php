<?php include '../database.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"content="width=device-width, initial-scale=1.0">
		<title>Admin</title>
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>	
		<div class="container">
			<div class="form-section">        
				<form action="index.php" id="grivence-login" method="post"  >
					<div class="login-box">
						<h1>Admin</h1>
						<p class="error field_erros" id="error_msg" ></p>
						<input type="email"class="email ele"placeholder="youremail@email.com" name="email">
						<input type="password"class="password ele"placeholder="password" name="psw">
						<button type="submit" id="lgnSubmit" value="Login" name="submit" class="clkbtn" >Login</button>
					</div>
				</form>				
			</div>
		</div>		
	</body>
</html>
<?php  
session_start();
if(isset($_REQUEST['submit'])){      
        $email = isset($_REQUEST['email']) ? stripslashes($_REQUEST['email']) : '' ;   
        if(!empty($email)){ $email = mysqli_real_escape_string($con, $email); }
        $password = isset($_REQUEST['psw']) ? stripslashes($_REQUEST['psw']) : '' ;
        if(!empty($password)){ $password = mysqli_real_escape_string($con, $password); }
		$query = "SELECT * FROM `users` WHERE `email`='$email'AND `password`='$password' AND `role_type`='Admin' " ;
		$result = mysqli_query($con, $query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		if ($rows == 1) { 
		// $_SESSION['email'] = $email;
		$fetch_data = mysqli_fetch_assoc($result);
		$_SESSION['print_email'] = $fetch_data['email'];		
		$_SESSION['print_fname'] = $fetch_data['first_name'];
		$_SESSION['print_lname'] = $fetch_data['last_name'];		
		header("Location: dashboard.php");		
		}
		else {?>
			<script>				
				const errorMessageElement = document.getElementById("error_msg");
        		if (errorMessageElement) {			
            		errorMessageElement.textContent = "Invalid user / password";
        		} 				
			</script>
			<?php 
		  }
	}
?>
