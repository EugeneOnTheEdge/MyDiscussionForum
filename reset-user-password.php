<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
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
			</nav>

		</header>

		<div class="main">
			<div class = "Reset_form">
	            <form method="POST" action="reset-user-password.php">
	                <fieldset>
	                    <legend>Success</legend>
	                        <?php 
								session_start();

								if ($_SESSION["email"] == null) {
									echo "<script type='text/javascript'>window.location.href = 'RegisterAndLogin.php';</script>";
								}

								$new_password = $_POST["new-password"];
								$confirm_new_password = $_POST["confirm-new-password"];

								if ($new_password != $confirm_new_password) {
									echo "<script type='text/javascript'>alert('Umm... The passwords didn\'t match. Please try again...'); window.location.href = 'ResetPassword.php';</script>";
								}
								else if (strlen($new_password) == 0) {
									echo "<script type='text/javascript'>alert('Your new password can\'t be empty tho. Please try again...'); window.location.href = 'ResetPassword.php';</script>";
								}
								else {
									$host = "localhost";
									$database = "cosc360-project";
									$user = "root";
									$pwd = "";

									$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

									$query1 = "UPDATE Users SET password = '" . password_hash($new_password,PASSWORD_DEFAULT) . "' WHERE email = '" . $_SESSION["email"] . "';";
									$result1 = $PDO->query($query1);

									$row = $result1->fetch();
									if ($row != null) {
										echo "<h3>Uh oh, something happened :(</h3><p>We couldn't reset your password due to some server issues. Please try again...</p>";
									}
									else {
										echo "<h3>Your password has been successfully reset!</h3>";
										echo "<p>You may now <a href='RegisterAndLogin.php'>sign in</a> using your new password :)</p>";

										$_SESSION["email"] = null;
									}
								}
							 ?>
	                </fieldset>
	            </form>
        	</div>			
		</div>
	</div>
</body>
</html>