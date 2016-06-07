<?php
session_start();
require_once "functions.php";
	$user     = new LoginRegistration();
	$uid      = $_SESSION['uid'];
	//$username    = $_SESSION['uname'];

	/*  if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
	}
	else{
		header("Location: index1.php");
		exit();
	}*/

	if(!$user->getSession()){
		header('Location: login1.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Update Profile</title>
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
				<h2>Update your profile</h2>
			<p class="msg">
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$username = $_POST['username'];						
						$name     = $_POST['name'];
						$email    = $_POST['email'];
						$website  = $_POST['website'];

						if(empty($username) or empty($name) or empty($email) or empty($website)){
							echo "<span style='color:#e53d37'>Error... Field must not be empty</span>";
						}
						else{
							$update = $user->updateUser($uid, $username, $name, $email, $website);
							if($update){
								echo "<span style='color:green'> Information updated successfully</span>";
							}
						}						
					}
				?>
			</p>
			<?php 
				$result = $user->getUserDetails($uid);
				foreach($result as $row){
			?>
						
			<div class="login_reg">
				<form action="" method="post">
					<table>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username" value="<?php echo $row['username']; ?>" /></td>
						</tr>						

						<tr>
							<td>Name</td>
							<td><input type="text" name="name" value="<?php echo $row['name']; ?>" /></td>
						</tr>

						<tr>
							<td>Email</td>
							<td><input type="email" name="email" value="<?php echo $row['email']; ?>" /></td>
						</tr>

						<tr>
							<td>Website</td>
							<td><input type="text" name="website" value="<?php echo $row['website']; ?>" /></td>
						</tr>

						<tr>
							<td colspan="2">
							<span style="float:right">
								<input type="submit" name="update" value="Update" />
								<input type="reset" value="Reset" />
							</span>
							</td>
						</tr>

					</table>
				</form>
			</div>	
			<?php } ?>
			
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