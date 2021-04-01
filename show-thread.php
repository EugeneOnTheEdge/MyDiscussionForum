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
				<?php 
					session_start();

					if (sizeof($_SESSION) == 0) {
						$_SESSION["loggedIn"] = false;
						$_SESSION["username"] = null;
						$_SESSION["userId"] = 1;
					}

					if ($_SESSION["loggedIn"]) {
						echo "<a href=\"sign-in.php\" id=\"sign-in-button\">Sign In</a>";
					}
					else {
						echo "<a href=\"sign-up.php\" id=\"sign-in-button\">Sign Up</a>";
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
				echo "<small><b>" . $thread["username"] . "</b> on " . $thread["time"] . " / Views: " . $thread["views"] . "</small><hr>";
				echo "<p>" . $thread["content"] . "</p>";

				// Update post view count
				$query = "UPDATE Posts SET views = views + 1 WHERE postId = " . $postID . ";";
				$PDO->exec($query);
			 ?>
		</div>
	</div>
</body>
</html>