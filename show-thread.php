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

					$query = "SELECT * FROM Comments, Posts, Users WHERE Posts.postId = " . $postID . " AND Comments.postId = " . $postID . " AND Comments.userId = Users.userId; AND Posts.userId = Users.userId";
					$result = $PDO->query($query);

					$comment = $result -> fetch();

					while ($comment != null) {
						echo "<div class='comment'>";
						echo "<p>" . $comment["comment"] . "</p>";
						echo "<hr>";
						echo "<small>" . $comment["username"] . " / " . $comment["time"] . "</small>";

						echo "<div class='reply-comment-section'>";
						echo "<button type='button' onclick='toggleElement(this, \"#reply-comment-form-" . $comment["commentId"] . "\")'>Reply</button></div>";
						echo "<form style='display:none' id='reply-comment-form-" . $comment["commentId"] . "' method='POST' action='post-comment.php'>";
						echo "<span style='display:none;'><input type='text' name='postID' value='" . $postID . "'></span>";
						echo "<span style='display:none;'><input type='text' name='parentCommentID' value='" . $comment["commentId"] . "'></span>";
						echo "<textarea cols='50' rows='10' minlength='1' name='comment-content' maxlength='500' placeholder='Reply to @" . $comment["username"] . "'></textarea><br>";
						echo "<input type='Submit' value='Post'>";
						echo "</form>";
						echo "</div>";

						$comment = $result -> fetch();
					}
				 ?>
			</div>
		</div>
	</div>
</body>
</html>