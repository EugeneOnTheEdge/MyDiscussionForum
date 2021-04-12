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

					$firstname = ucwords($_POST["account_firstname"]);
					$lastname = ucwords($_POST["account_lastname"]);
					$username = $_POST["account_username"];
					$email = $_POST["account_email"];
					$password = $_POST["account_password"];
					$confirmPassword = $_POST["confirm_password"];
					$profilePicture = $_POST["profile_picture"];
					$securityQuestion = $_POST["security-question"];
					$securityAnswer = $_POST["security-answer"];

					if (!$_SESSION["loggedIn"]) {
						if ($confirmPassword != $password) {
							echo "<script type='text/javascript'>alert('Your passwords do not match... Please try again!'); window.location.href = 'RegisterAndLogin.php';</script>";
						}
						else {
							$host = "localhost";
							$database = "cosc360-project";
							$user = "root";
							$pwd = "";

							$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

							// Check if user account with the same email address / username already exists
							$query1 = "SELECT email, username FROM Users WHERE email = '" . $email . "' OR username = '" . $username . "';";
							$result1 = $PDO->query($query1);

							$row = $result1->fetch();
							if ($row != null) {
								echo "<script type='text/javascript'>alert('Whoops, couldn\'t create your account. Another user already has the same username and/or email :('); window.location.href = 'RegisterAndLogin.php';</script>";
							}
							else { // No other users with the same username/email
								$query2 = "INSERT INTO Users (firstName,lastName,email,username,password,securityQuestion,securityAnswer) VALUES ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $username . "','" . $password . "','" . $securityQuestion . "','" . $securityAnswer . "');";
								$PDO->exec($query2);
								echo "<script type='text/javascript'>alert('Great! Your account has been created. You may now sign in with your account :)'); window.location.href = 'RegisterAndLogin.php';</script>";
							}
						}
					}
					else {

					}
				 ?>
			</nav>

		</header>

		<div class="main">
			
		</div>
	</div>
</body>
</html>