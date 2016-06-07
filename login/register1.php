<?php
session_start();
require_once "functions.php";
	$user = new LoginRegistration();
	if($user->getSession()){
		header('Location: index1.php');
		exit();
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registration Page</title>
		<link rel="stylesheet" type="text/css" href="style1.css" />
	</head>

	<body>
		<div class="wrapper">
			<div class="header">
				<h3>PHP OOP Login-Register System</h3>
			</div>
			<div class="mainmenu">
				<ul>
					<?php  if($user->getSession()){ ?>

					<li><a href="index1.php">Home</a></li>
					<li><a href="profile.php">Show Profile</a></li>
					<li><a href="ChangePassword1.php">Change Password</a></li>
					<li><a href="Logout1.php">Logout</a></li>

					<?php } else { ?>

					<li><a href="Login1.php">Login</a></li>
					<li><a href="Register1.php">Register</a></li>
					<?php } ?>

				</ul>

			</div>
			<div class="content">
				<h2>Register</h2>
			

			<p class="msg">
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$username = $_POST['username'];
						$password = $_POST['password'];
						$name     = $_POST['name'];
						$email    = $_POST['email'];
						$website  = $_POST['website'];

						if(empty($username) or empty($password) or empty($name) or empty($email) or empty($website)){
							echo "<span style='color:#e53d37'>Error... Field must not be empty</span>";
						}
						else{
							$password = md5($password);
							$register = $user->registerUser($username,$password,$name,$email,$website);
							if($register){
								echo "<span style='color:green'>Register done <a href='login1.php'>Click here</a>for login.<span>";
							}
							else{
								echo "<span style='color:#e53d37'>Username or email already exist.</span>";
							}
						}

					}
				?>
			</p>
			<div class="login_reg">
				<form action="" method="post">
					<table>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username" placeholder="Please give your username" /></td>
						</tr>

						<tr>
							<td>Password</td>
							<td><input type="password" name="password" placeholder="Please give your password" /></td>
						</tr>

						<tr>
							<td>Name</td>
							<td><input type="text" name="name" placeholder="Please enter your name" /></td>
						</tr>

						<tr>
							<td>Email</td>
							<td><input type="email" name="email" placeholder="Please enter your email addres" /></td>
						</tr>

						<tr>
							<td>Website</td>
							<td><input type="text" name="website" placeholder="Please enter your website addres" /></td>
						</tr>

						<tr>
							<td colspan="2">
							<span style="float:right">
								<input type="submit" name="register" value="Register" />
								<input type="reset" value="Reset" />
							</span>
							</td>
						</tr>

					</table>
				</form>
			</div>

	<div class="back">
		<a href="login1.php"><img src="img/back.png" alt="back" /></a>
	</div>
	</div>
	<div class="footer">
		<h3>www.firstphpprojectloginregister.com</h3>
	</div>
		</div>
	</body>


</html>