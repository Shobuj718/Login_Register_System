<?php
session_start();
require_once "functions.php";
	$user     = new LoginRegistration();
	$uid      = $_SESSION['uid'];

	if(!$user->getSession()){
		header('Location: Login1.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Change Password</title>
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
						$old_pass      = $_POST['old_password'];						
						$new_pass      = $_POST['new_password'];
						$confirm_pass  = $_POST['confirm_password'];

						if(empty($old_pass) or empty($new_pass) or empty($confirm_pass)){
							echo "<span style='color:#e53d37'>Error... Field must not be empty</span>";
						}
						else if($new_pass != $confirm_pass){
							echo "<span style='color:#e53d37'>Error..Password not matched</span>";
						}
						else{
							$old_pass = md5($old_pass);
							$new_pass = md5($new_pass);
							$passUpdate = $user->updatePassword($uid,$new_pass,$old_pass);
						}
												
					}
				?>
			</p>
			
						
			<div class="login_reg">
				<form action="" method="post">
					<table>
						<tr>
							<td>Old Password</td>
							<td><input type="text" name="old_password"  placeholder="Please enter your old password" /></td>
						</tr>						

						<tr>
							<td>New Password</td>
							<td><input type="text" name="new_password"  placeholder="Please type your new password"	/></td>
						</tr>

						<tr>
							<td>Cofirm</td>
							<td><input type="text" name="confirm_password" placeholder="Please type password again." /></td>
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