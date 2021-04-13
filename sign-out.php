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

					$_SESSION["loggedIn"] = false;
					$_SESSION["username"] = null;
					$_SESSION["userId"] = null;
					$_SESSION["firstName"] = null;
					$_SESSION["admin"] = false;
				
					echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
				 ?>
			</nav>

		</header>

		<div class="main">
			
		</div>
	</div>
</body>
</html>