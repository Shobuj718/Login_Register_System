
<?php
session_start();
require_once "functions.php";
	$user     = new LoginRegistration();
	$uid      = $_SESSION['uid'];
	$username = $_SESSION['uname'];

	if(!$user->getSession()){
		header('Location: login1.php');
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
					<li><a href="index.php">Home</a></li>
					<li><a href="profile.php">Show Profile</a></li>
					<li><a href="ChangePassword.php">Change Password</a></li>
					<li><a href="Logout.php">Logout</a></li>
					<li><a href="Login.php">Login</a></li>
					<li><a href="Register.php">Register</a></li>

				</ul>

			</div>
			<div class="content">
				<h2>Login</h2>
			

			<p class="msg">
				
			</p>
			
			<h2>Welcome,<?php echo $username; ?></h2>

			<p class ="userlist">All User List.</p>

			<table class = "tbl_one">
				<tr>
					<th>Serial</th>
					<th>Name</th>
					<th>Profile</th>
				</tr>
				<?php 
					$i = 0;
					$alluser =$user->getAllusers();
					foreach ($alluser as $user) {
						$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $user['name']; ?></td>
					<td><a href="userProfile.php?id=<?php echo $user['id']; ?>">View Details</a></td>
				</tr>
				<?php } ?>
			</table>


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