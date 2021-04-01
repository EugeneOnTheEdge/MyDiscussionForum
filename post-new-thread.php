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
						$_SESSION["userId"] = 1;
					}

					if (!$_SESSION["loggedIn"]) {
						$host = "localhost";
						$database = "cosc360-project";
						$user = "root";
						$pwd = "";

						$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);


						// Check if the user has clicked the anonymous comment checkbox
						if (isset($_POST["anonymous-comment"])) {
							$anonymous_comment = 1;
						}
						else {
							$anonymous_comment = 0;
						}

						$query = "INSERT INTO Posts (time,title,content,userId,views,allowAnonymousComments) VALUES (CURRENT_TIMESTAMP,\"" . $_POST["title"] . "\",\"" . $_POST["content"] . "\"," . $_SESSION["userId"] . ",0," . $anonymous_comment . ");";
						//echo "$query <br>";
						
						$PDO->exec($query);

						echo "<h2>Your thread has been posted!</h2>";
						/*
						$query = "SELECT * FROM Users;";
						$result = $PDO->query($query);

						$row = $result->fetch();
						while ($row != null) {
							echo $row["username"] . " " . $row["firstName"] . " " . $row["lastName"] . "<br>";

							$row = $result->fetch();
						}
						*/
					}
					else {
						echo "<a href=\"sign-up.php\" id=\"sign-in-button\">Sign Up</a>";
					}
				 ?>
			</nav>

		</header>

		<div class="main">
			
		</div>
	</div>
</body>
</html>