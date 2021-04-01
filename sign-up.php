<!DOCTYPE html>
<html>
<head>
	<title>MyDiscussionForum</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="wrapper clearfix">
		<header class="clearfix">
			<h1 class="clearfix">MyDiscussionForum</h1>
			
			<nav>
				<a href="index.php">Home</a>
				<a href="#">Search</a>
				<?php 
					session_start();

					if (sizeof($_SESSION) == 0) {
						$_SESSION["loggedIn"] = false;
						$_SESSION["username"] = null;
					}

					if ($_SESSION["loggedIn"]) {
						echo "<a href=\"sign-in.php\" id=\"sign-in-button\">Sign In</a>";
					}
					else {
						echo "<a href=\"sign-up.php\" id=\"sign-in-button\">Sign Up</a>";
					}
				 ?>
			</nav>

		</header>

		<div class="main">
			<div class="center-panel">
				<h2>Create Your Account!</h2>
				<form action="complete-sign-up.php" method="POST">
					<table>
						<tr>
							<td><label>Name</label></td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<td><label>Email</label></td>
							<td><input type="email" name="email"></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td><label>Confirm Password</label></td>
							<td><input type="password" name="confirmPassword"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name=""></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>