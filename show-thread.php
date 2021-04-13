<!DOCTYPE html>
<html>
<head>
	<title>MyDiscussionForum</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script type="text/javascript">
		function toggleElement(button, target) {
			$(target).slideToggle(250);
			if ($(button).html() == "Reply")
				$(button).prop("innerHTML","Hide Reply");
			else
				$(button).prop("innerHTML","Reply");
		}
	</script>
</head>
<body>

	<div class="wrapper clearfix">
		<header class="clearfix">
			<h1 class="clearfix">MyDiscussionForum</h1>
			
			<nav>
				<a href="index.php">Home</a>
				<a href="#">Search</a>
				<a href="new-thread.php">+ New Thread</a>
				<?php 
					session_start();

					if (sizeof($_SESSION) == 0) {
						$_SESSION["loggedIn"] = false;
						$_SESSION["username"] = null;
						$_SESSION["userId"] = null;
						$_SESSION["firstName"] = null;
						$_SESSION["admin"] = false;
					}

					if ($_SESSION["admin"]) {
						echo "<a href='adminDashboard.php'>Admin Dashboard</a>";
					}

					if ($_SESSION["loggedIn"]) {
						echo "<a href=\"sign-out.php\" id=\"sign-in-button\">Sign Out</a>";
					}
					else {
						echo "<a href=\"RegisterAndLogin.php\" id=\"sign-in-button\">Sign In / Sign Up</a>";
					}
				 ?>
			</nav>

		</header>

		<div class="main">
			<?php 
				$postID = $_GET["postID"];
				$userID = $_SESSION["userId"];

				$host = "localhost";
				$database = "cosc360-project";
				$user = "root";
				$pwd = "";

				$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

				$query = "SELECT * FROM Posts, Users WHERE Posts.userId = Users.userId AND Posts.postId = " . $postID . ";";
				$result = $PDO->query($query);

				$thread = $result->fetch();
				
				echo "<h2>" . $thread["title"] . "</h2>";
				echo "<p>" . $thread["content"] . "</p>";
				echo "<small><b>" . $thread["username"] . "</b> on " . $thread["time"] . " / Views: " . $thread["views"] . "</small>";
				echo "<div class='reply-comment-section'>";
				echo "<button type='button' onclick='toggleElement(this, \"#reply-comment-form-0\")'>Reply</button></div>";
				echo "<form style='display:none' id='reply-comment-form-0' method='POST' action='post-comment.php'>";
				echo "<span style='display:none;'><input type='text' name='postID' value='" . $postID . "'></span>";
				echo "<span style='display:none;'><input type='text' name='parentCommentID' value='0'></span>";
				echo "<textarea cols='50' rows='10' minlength='1' name='comment-content' maxlength='500'></textarea><br>";
				echo "<input type='Submit' value='Post'>";
				echo "</form>"; 

				// Update post view count
				$query = "UPDATE Posts SET views = views + 1 WHERE postId = " . $postID . ";";
				$PDO->exec($query);
			 ?>

			<hr>

			<div class="comments">
				<h3>Comments</h3>
				<?php 
					function display_comment($comment, $result) {
						if ($comment == null) {
							return;
						}
						else {
							echo "<div class='comment'>";
							echo "<p>" . $comment["comment"] . "</p>";
							echo "<hr>";

							echo "<small>" . $comment["username"] . " / " . $comment["commentTime"] . "</small><br>";

							// -- Count total of upvotes and downvotes for each comment 
							$query_totalUpvotes = "SELECT Count(Upvotes.upvoteId) AS NUMBER_OF_UPVOTES FROM Upvotes WHERE commentId = " . $comment["commentId"] . ";";

							$upvote_result = $GLOBALS["PDO"] -> query($query_totalUpvotes);
							$upvote_counts = $upvote_result -> fetch();
							$upvote_counts = $upvote_counts["NUMBER_OF_UPVOTES"];

							$query_totalDownvotes = "SELECT Count(Downvotes.downvoteId) AS NUMBER_OF_DOWNVOTES FROM Downvotes WHERE commentId = " . $comment["commentId"] . ";";
							$downvote_result = $GLOBALS["PDO"] -> query($query_totalDownvotes);
							$downvote_counts = $downvote_result -> fetch();
							$downvote_counts = $downvote_counts["NUMBER_OF_DOWNVOTES"];
							// ---

							if ($GLOBALS["userID"] != null) {
								// -- Check if user has upvoted the comment
								$query_upvoted = "SELECT Count(Upvotes.upvoteId) AS UPVOTED FROM Upvotes WHERE commentId = " . $comment["commentId"] . " AND userId = " . $GLOBALS["userID"] . ";";

								$upvoted_result = $GLOBALS["PDO"] -> query($query_upvoted);
								$upvoted_result = $upvoted_result -> fetch();
								$upvoted = $upvoted_result["UPVOTED"];

								$query_downvoted = "SELECT Count(Downvotes.downvoteId) AS DOWNVOTED FROM Downvotes WHERE commentId = " . $comment["commentId"] . " AND userId = " . $GLOBALS["userID"] . ";";

								$downvoted_result = $GLOBALS["PDO"] -> query($query_downvoted);
								$downvoted_result = $downvoted_result -> fetch();
								$downvoted = $downvoted_result["DOWNVOTED"];
								// ---

								if (boolval($upvoted)) {
									echo "<a href='vote.php?vote=1&commentID=" . $comment["commentId"] . "&postID=" . $GLOBALS["postID"] . "'><button class='upvote-button upvoted'><b>Upvote (" . $upvote_counts . ")</b></button></a>";
									echo "<a href='vote.php?vote=0&commentID=" . $comment["commentId"] . "&postID=" . $GLOBALS["postID"] . "'><button class='downvote-button'>Downvote (" . $downvote_counts . ")</button></a>";
								}
								else if (boolval($downvoted)) {
									echo "<a href='vote.php?vote=1&commentID=" . $comment["commentId"] . "&postID=" . $GLOBALS["postID"] . "'><button class='upvote-button'>Upvote (" . $upvote_counts . ")</button></a>";
									echo "<a href='vote.php?vote=0&commentID=" . $comment["commentId"] . "&postID=" . $GLOBALS["postID"] . "'><button class='downvote-button downvoted'><b>Downvote (" . $downvote_counts . ")</b></button></a>";
								}
								else {
									echo "<a href='vote.php?vote=1&commentID=" . $comment["commentId"] . "&postID=" . $GLOBALS["postID"] . "'><button class='upvote-button'>Upvote (" . $upvote_counts . ")</button></a>";
									echo "<a href='vote.php?vote=0&commentID=" . $comment["commentId"] . "&postID=" . $GLOBALS["postID"] . "'><button class='downvote-button'>Downvote (" . $downvote_counts . ")</button></a>";
								}
							}
							else {
								echo "<a href='vote.php?vote=1&commentID=" . $comment["commentId"] . "&postID=" . $GLOBALS["postID"] . "'><button class='upvote-button'>Upvote (" . $upvote_counts . ")</button></a>";
								echo "<a href='vote.php?vote=0&commentID=" . $comment["commentId"] . "&postID=" . $GLOBALS["postID"] . "'><button class='downvote-button'>Downvote (" . $downvote_counts . ")</button></a>";
							}

							echo "<div class='reply-comment-section'>";
							echo "<button type='button' onclick='toggleElement(this, \"#reply-comment-form-" . $comment["commentId"] . "\")'>Reply</button></div>";
							echo "<form style='display:none' id='reply-comment-form-" . $comment["commentId"] . "' method='POST' action='post-comment.php'>";
							echo "<span style='display:none;'><input type='text' name='postID' value='" . $GLOBALS["postID"] . "'></span>";
							echo "<span style='display:none;'><input type='text' name='parentCommentID' value='" . $comment["commentId"] . "'></span>";
							echo "<textarea cols='50' rows='10' minlength='1' name='comment-content' maxlength='500' placeholder='Reply to @" . $comment["username"] . "'></textarea><br>";
							echo "<input type='Submit' value='Post'>";
							echo "</form>";

							$query_allRepliesToTheSameComment = "SELECT * FROM Comments, Users WHERE parentCommentID = " . $comment["commentId"] . " AND Comments.userId = Users.userId;";
							$results = $GLOBALS["PDO"] -> query($query_allRepliesToTheSameComment);

							$replyToTheSameComment = $results -> fetch();

							while ($replyToTheSameComment != null) {
								display_comment($replyToTheSameComment, $results);

								$replyToTheSameComment = $results -> fetch();
							}
							echo "</div>";
						}
					}

					$query = "SELECT *, Comments.commentId, COUNT(Upvotes.upvoteId) AS UpvoteCount, COUNT(Downvotes.downvoteId) AS DownvoteCount 
						FROM Comments JOIN Posts JOIN Users 
							LEFT JOIN Upvotes ON Upvotes.commentId = Comments.commentId
						    LEFT JOIN Downvotes ON Downvotes.commentId = Comments.commentId
						WHERE Posts.postId = $postID
							AND Comments.postId = $postID
						    AND Comments.userId = Users.userId 
						GROUP BY Comments.commentId;";

					$query = "SELECT * FROM Comments, Posts, Users WHERE Posts.postId = " . $postID . " AND Comments.postId = " . $postID . " AND Comments.userId = Users.userId AND Comments.parentCommentId = 0;";

					$result = $PDO->query($query);

					$comment = $result -> fetch();

					while ($comment != null) {
						
						display_comment($comment, $result);

						$comment = $result -> fetch();
					}
				 ?>
			</div>
		</div>
	</div>
</body>
</html>