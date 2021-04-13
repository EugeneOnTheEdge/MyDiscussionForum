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
					$postID = $_GET["postID"];

					$vote = $_GET["vote"]; // 0 = downvote ; 1 = upvote
					$commentID = $_GET["commentID"];

					if (!$_SESSION["loggedIn"]) {
						echo "<script type='text/javascript'>alert('You need to be logged in to vote!');</script>";
						echo "<script type='text/javascript'>window.location.href = 'show-thread.php?postID=" . $postID . "';</script>";
					}
					else {
						$host = "localhost";
						$database = "cosc360-project";
						$user = "root";
						$pwd = "";

						$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

						if (boolval($vote)) { // upvote
							$query_user_has_upvoted = "SELECT Count(Upvotes.upvoteId) AS NUMBER_OF_UPVOTES FROM Upvotes WHERE commentId = " . $commentID . " AND userId = " . $userID . ";";

							$upvote_result = $PDO -> query($query_user_has_upvoted);
							$upvote_counts = $upvote_result -> fetch();
							$upvote_counts = $upvote_counts["NUMBER_OF_UPVOTES"];

							if ($upvote_counts > 0) { // user has voted the comment before
								$query = "DELETE FROM Upvotes WHERE commentId = $commentID AND userId = $userID;";
							}
							else {
								$query = "INSERT INTO Upvotes (commentId,userId) VALUES ($commentID,$userID);";
							}	
							$PDO -> exec($query);

							// Remove any downvotes from the user for the corresponding comments
							$query = "DELETE FROM Downvotes WHERE commentId = $commentID AND userId = $userID;";
							$PDO -> exec($query);
						}
						else {
							$query_user_has_downvoted = "SELECT Count(Downvotes.downvoteId) AS NUMBER_OF_DOWNVOTES FROM Downvotes WHERE commentId = " . $commentID . " AND userId = " . $userID . ";";
							$downvote_result = $PDO -> query($query_user_has_downvoted);
							$downvote_counts = $downvote_result -> fetch();
							$downvote_counts = $downvote_counts["NUMBER_OF_DOWNVOTES"];

							if ($downvote_counts > 0) { // user has voted the comment before
								$query = "DELETE FROM Downvotes WHERE commentId = $commentID AND userId = $userID;";
							}
							else {
								$query = "INSERT INTO Downvotes (commentId,userId) VALUES ($commentID,$userID);";
							}	
							$PDO -> exec($query);

							// Remove any upvotes from the user for the corresponding comments
							$query = "DELETE FROM Upvotes WHERE commentId = $commentID AND userId = $userID;";
							$PDO -> exec($query);
						}
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