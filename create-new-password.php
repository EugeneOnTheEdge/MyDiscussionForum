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
                        <?php 
							session_start();

							$email = $_SESSION["email"];
							$securityAnswer = $_POST["security-answer"];

							$host = "localhost";
							$database = "cosc360-project";
							$user = "root";
							$pwd = "";

							$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

							$query1 = "SELECT username, email, securityAnswer, firstName, lastName FROM Users WHERE email = '" . $_SESSION["email"] . "';";
							$result1 = $PDO->query($query1);

							$row = $result1->fetch();
							if ($row != null) {
								if ($row["securityAnswer"] == $securityAnswer) {
									echo "<legend>Create New Password for <b>" . $row["username"] . "</b></legend>";
								}
								else {
									echo "<script type='text/javascript'>alert('Hmm.. Your security answer does not match. Please try again.'); window.location.href = 'ResetPassword.php';</script>";
								}
							}
							else {
								echo "<script type='text/javascript'>alert('Hmm.. we don\'t have anyone registered with the email address " . $email . ". Please try again...'); window.location.href = 'ResetPassword.php';</script>";
							}
						 ?>
						 <p>
						 	<label>New Password: </label>
						 	<input type="password" name="new-password" placeholder="New Password" minlength="6">
						 </p>
						 <p>
						 	<label>Confirm New Password: </label>
						 	<input type="password" name="confirm-new-password" placeholder="Confirm Password" minlength="6">
						 </p>
                    <p>
                        <input type = "submit" value = "Confirm" />
                    </p>
                </fieldset>
            </form>
        </div>
						
		</div>
	</div>
</body>
</html>