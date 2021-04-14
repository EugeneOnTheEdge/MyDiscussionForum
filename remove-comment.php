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
				$commentID = $_GET["commentID"];
				$confirmDelete = $_GET["confirmDelete"];
				$userID = $_SESSION["userId"];

				$host = "localhost";
				$database = "cosc360-project";
				$user = "root";
				$pwd = "";

				$PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

				$query = "SELECT * FROM Comments, Users WHERE Comments.commentId = $commentID AND Comments.userId = Users.userId";
				$result = $PDO->query($query);

				$comment = $result->fetch();

				// ONLY ALLOW ADMINS AND COMMENTORS TO REMOVE COMMENT
				if ((!boolval($_SESSION["admin"])) && ($comment["userId"] != $userID)) {
					echo "<script type='text/javascript'>alert('Only the commentor or moderator can remove the comment!'); window.location.href = 'show-thread.php?postID=" . $comment["postId"] . "';</script>";
				}	
				else {
					if (!boolval($confirmDelete)) {
						echo "<h3>Are you sure to remove this comment:</h3>";
						echo "<div class='comment'>";
						echo "<p>" . $comment["comment"] . "</p>";
						echo "<hr>";

						if (boolval($comment["admin"]))
							echo "<small><span class='moderator-badge'>" . $comment["username"] . " (mod)</span> / " . $comment["commentTime"] . "</small><br>";
						else
							echo "<small>" . $comment["username"] . " / " . $comment["commentTime"] . "</small><br>";
						echo "</div>";

						echo "<a href='remove-comment.php?commentID=$commentID&confirmDelete=1'><button>Confirm Delete</button></a>";
						echo "<a href='show-thread.php?postID=$commentID'><button>Never mind, don't delete!</button></a>";
					}
					else {
						if ($admin)
							$query = "UPDATE Comments SET commentDeleted = 'ADMIN' WHERE commentId = " . $commentID . ";";
						else
							$query = "UPDATE Comments SET commentDeleted = 'USER' WHERE commentId = " . $commentID . ";";

						$PDO->exec($query);
						echo "<script type='text/javascript'>alert('Comment successfully deleted'); window.location.href = 'show-thread.php?postID=" . $comment["postId"] . "';</script>";
					}
				}	
			 ?>
		</div>
	</div>
</body>
</html>