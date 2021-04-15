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

				<?php require 'enforce-user-status.php' ?>
			</nav>

		</header>

		<div class="main">
			<?php 
				$postID = $_GET["postID"];
				$confirmDelete = $_GET["confirmDelete"];

				$host = "localhost";
				$database = "cosc360-project";
				$user = "root";
				$pwd = "";

				$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);
				$query = "SELECT * FROM Posts, Users WHERE Posts.userId = Users.userId AND postId = $postID;";
				
				$result = $PDO->query($query);

				$post = $result->fetch();

				// ONLY ALLOW ADMINS AND COMMENTORS TO REMOVE COMMENT
				if ((!boolval($_SESSION["admin"])) && ($comment["userId"] != $userID)) {
					echo "<script type='text/javascript'>alert('Only the commentor or moderator can remove the post!'); window.location.href = 'show-thread.php?postID=" . $post["postId"] . "';</script>";
				}	
				else {
					if (!boolval($confirmDelete)) {
						echo "<h3>Are you sure to remove this post:</h3>";
						echo "<div class='comment'>";
						echo "<h2>" . $post["title"] . "</h2>";
						echo "<p>" . $post["content"] . "</p>";
						echo "<hr>";

						if (boolval($post["admin"]))
							echo "<small><span class='moderator-badge'>" . $post["username"] . " (mod)</span> / " . $post["time"] . "";
						else
							echo "<small>" . $post["username"] . " / " . $post["time"];
						echo " / Views: " . $post["views"] . "</small><br>";
						echo "</div>";

						echo "<a href='admin_removePost.php?postID=$postID&confirmDelete=1'><button>Confirm Delete</button></a>";
						echo "<a href='adminEditRemovePost_editPost.php?postID=$postID'><button>Never mind, don't delete!</button></a>";
					}
					else {
						$query = "DELETE FROM Comments WHERE postId = $postID; DELETE FROM Posts WHERE postID = $postID";

						$PDO->exec($query);
						echo "<script type='text/javascript'>alert('Post successfully deleted'); window.location.href = 'adminEditRemovePost.php';</script>";
					}
				}	
			 ?>
		</div>
	</div>
</body>
</html>