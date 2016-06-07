<?php
session_start();
require_once "functions.php";
	$user     = new LoginRegistration();
	$uid      = $_SESSION['uid'];
	$username    = $_SESSION['uname'];

	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
	}
	else{
		header("Location: index1.php");
		exit();
	}

	if(!$user->getSession()){
		header('Location: login1.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>User Profile</title>
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

			<span class="login_msg">
				
			</span>

			<h2>Welcome,<?php echo $username ?></h2>
			

			<p class ="userlist">Profile of :<?php $user->getUsername($id); ?></p>
			
				<table class ="tbl_one">
					<?php 
						$getUsers = $user->getUserById($id);
						foreach($getUsers as $user){

					?>
					<tr>
						<td>Username</td>
						<td><?php echo $user['username']; ?></td>
					</tr>

					<tr>
						<td>Name</td>
						<td><?php echo $user['name']; ?></td>
					</tr>

					<tr>
						<td>Email</td>
						<td><?php echo $user['email']; ?></td>
					</tr>

					<tr>
						<td>Website</td>
						<td><?php echo $user['website']; ?></td>
					</tr>
						<?php  if($user['id'] == $uid){?>
					<tr>
						<td>Update Profile</td>
						<td><a href="update1.php?id=<?php echo $user['id']; ?>">Edit Profile</a></td>
					</tr>

					<?php } } ?>
				</table>
			
			<div class="back">
		<a href="index1.php"><img src="img/back.png" alt="back" /></a>

		</div>
	</div>
		<div class="footer">
			<h3>www.firstphpprojectloginregister.com</h3>
		</div>
	</div>
</body>
</html>