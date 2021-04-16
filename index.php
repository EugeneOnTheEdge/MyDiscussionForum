
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
				<a href="new-thread.php">+ New Thread</a>
				<?php require 'enforce-user-status.php' ?>
			</nav>

		</header>

		<?php 
			if ($_SESSION["loggedIn"]) {
				echo "<h1>Hi again, " . $_SESSION["firstName"] . "!</h1>";
			}
		 ?>

		<div class="main">
			<div class="left-panel">
				<h2>Trending threads</h2>
				<?php
					$host = "localhost";
					$database = "cosc360-project";
					$user = "root";
					$pwd = "";

					$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

					$query = "SELECT * FROM Posts, Users WHERE Posts.userId = Users.userId ORDER BY views DESC, lastUpdate DESC;";
					$result = $PDO->query($query);

					$thread = $result->fetch();
					while ($thread != null) {
						echo "<div class='threads'>";
						echo "<h4><a href='show-thread.php?postID=" . $thread["postId"] . "'>" . $thread["title"] . "</a></h4>";
						echo "<p>" . $thread["content"] . "</p><hr>";
						if (boolval($thread["admin"]))
							echo "<small>By <span class='moderator-badge'>" . $thread["username"] . " (mod)</span> on " . $thread["time"] . " / Views: " . $thread["views"] . "</small>";
						else
							echo "<small>By " . $thread["username"] . " on " . $thread["time"] . " / Views: " . $thread["views"] . "</small>";
						echo "</div>";

						$thread = $result->fetch();
					}
				 ?>
			</div>

			<div class="right-panel">
				<h2>Most recent threads</h2>
				<?php 
					$query = "SELECT * FROM Posts, Users WHERE Posts.userId = Users.userId ORDER BY lastUpdate DESC;";
					$result = $PDO->query($query);

					$thread = $result->fetch();
					while ($thread != null) {
						echo "<div class='threads'>";
						echo "<h4><a href='show-thread.php?postID=" . $thread["postId"] . "'>" . $thread["title"] . "</a></h4>";
						echo "<p>" . $thread["content"] . "</p><hr>";
						if (boolval($thread["admin"]))
							echo "<small>By <span class='moderator-badge'>" . $thread["username"] . " (mod)</span> on " . $thread["time"] . " / Views: " . $thread["views"] . "</small>";
						else
							echo "<small>By " . $thread["username"] . " on " . $thread["time"] . " / Views: " . $thread["views"] . "</small>";
						echo "</div>";

						$thread = $result->fetch();
					}
				 ?>
			</div>
		</div>
	</div>
</body>
</html>