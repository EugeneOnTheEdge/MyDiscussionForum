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

					$userID = $_SESSION["userId"];
					$username = $_SESSION["username"];

					$postID = $_POST["postID"];
					$parentCommentID = $_POST["parentCommentID"];
					$commentContent = $_POST["comment-content"];

					if (!$_SESSION["loggedIn"]) {
						// Need to check if the post allows anonymous commenting
					}
					else {
						$host = "localhost";
						$database = "cosc360-project";
						$user = "root";
						$pwd = "";

						$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

						// Check if user account with the same email address / username already exists
						$query1 = "INSERT INTO Comments (parentCommentId,commentTime,postId,userId,comment) VALUES (" . $parentCommentID . ",CURRENT_TIMESTAMP," . $postID . "," . $userID . ",'" . $commentContent . "');";
						$result1 = $PDO->exec($query1);

						echo "<script type='text/javascript'>alert('Your comment has been posted!');</script>";
						echo "<script type='text/javascript'>window.location.href = 'show-thread.php?postID=" . $postID . "';</script>";
					}
				 ?>
			</nav>

		</header>

		<div class="main">
			
		</div>
	</div>
</body>
</html>