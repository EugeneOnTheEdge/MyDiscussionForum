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

					$username = $_POST["account_username"];
					$password = $_POST["account_password"];

					if (!$_SESSION["loggedIn"]) {
						$host = "localhost";
						$database = "cosc360-project";
						$user = "root";
						$pwd = "";

						$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

						$query1 = "SELECT * FROM Users WHERE username = '" . $username . "';";
						$result1 = $PDO->query($query1);

						$row = $result1->fetch();
						if ($row != null) {
							if (password_verify($password, $row["password"])) {
								$_SESSION["loggedIn"] = true;
								$_SESSION["username"] = $row["username"];
								$_SESSION["userId"] = $row["userId"];
								$_SESSION["firstName"] = $row["firstName"];
								$_SESSION["admin"] = boolval($row["admin"]);
								$_SESSION["accountStatus"] = $row["accountStatus"];

								if ($_SESSION["accountStatus"] == "ACTIVE")
									echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
								else
									echo "<script type='text/javascript'>alert('Uh oh, your account has been disabled by our moderators. Please contact our admins.');window.location.href = 'sign-out.php';</script>";
							}
							else {
								echo "<script type='text/javascript'>alert('Uh oh, you\'ve got an incorrect username and password combination there. Please check it again...'); window.location.href = 'RegisterAndLogin.php';</script>";
							}
						}
						else {
							echo "<script type='text/javascript'>alert('Uh oh, you\'ve got an incorrect username and password combination there. Please check it again...'); window.location.href = 'RegisterAndLogin.php';</script>";
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