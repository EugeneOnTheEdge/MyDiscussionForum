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

		<?php 
			if ($_SESSION["loggedIn"]) {
				echo "<h1>Hi again, " . $_SESSION["firstName"] . "!</h1>";
			}
		 ?>

		<div class="main">
			<div class="left-panel">
				<h2>Categories</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
			</div>

			<div class="right-panel">
				<h2>Most recent threads</h2>
				<?php 

					$host = "localhost";
					$database = "cosc360-project";
					$user = "root";
					$pwd = "";

					$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

					$query = "SELECT * FROM Posts, Users WHERE Posts.userId = Users.userId;";
					$result = $PDO->query($query);

					$thread = $result->fetch();
					while ($thread != null) {
						echo "<div class='threads'>";
						echo "<h4><a href='show-thread.php?postID=" . $thread["postId"] . "'>" . $thread["title"] . "</a></h4>";
						echo "<p>" . $thread["content"] . "</p><hr>";
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