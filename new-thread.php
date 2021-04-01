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
			<h2>Post a new thread!</h2>
			<form id="thread-description" action="post-new-thread.php" method="POST">
				<table>
					<tr><td>Title</td><td><input type="text" name="title"></td></tr>
					<tr><td>Content</td><td><textarea name="content" form="thread-description"></textarea></td></tr>
					<tr><td>Allow anonymous comments?</td><td><input type="checkbox" name="anonymous-comment"></td></tr>
					<tr><td></td><td><input type="submit"></td></tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>