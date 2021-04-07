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
            <form method="POST" action="create-new-password.php">
                <fieldset>
                    <legend>Verify Your Identity</legend>
                        <?php 
							session_start();

							$email = $_POST["account_email"];

							$host = "localhost";
							$database = "cosc360-project";
							$user = "root";
							$pwd = "";

							$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

							$query1 = "SELECT email, securityQuestion, firstName, lastName FROM Users WHERE email = '" . $email . "';";
							$result1 = $PDO->query($query1);

							$row = $result1->fetch();
							if ($row != null) {
								echo "<p>Resetting password for <b>" . $row["firstName"] . " " . $row["lastName"] . "</b></p><hr>";
								echo "<h3>Question: " . $row["securityQuestion"] . "</h3>";
								echo "<input type='text' name='security-answer' required>";
								$_SESSION["email"] = $row["email"];
							}
							else {
								echo "<script type='text/javascript'>alert('Hmm.. we don\'t have anyone registered with the email address " . $email . ". Please try again...'); window.location.href = 'ResetPassword.php';</script>";
							}
						 ?>
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