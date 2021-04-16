<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href = "css/adminStyle.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
		table {
			display: block;
			margin-bottom: 1em;
		}
		td, th {
			padding-left: 1em;
		}
	</style>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <?php 
      session_start();

      if ($_SESSION["loggedIn"]) {
        if (boolval($_SESSION["admin"])) {
          $host = "localhost";
          $database = "cosc360-project";
          $user = "root";
          $pwd = "";

          $PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);
        }
        else {
          echo "<script type='text/javascript'>alert('Hey! You\'re unauthorized to view this page. Only users with admin access can view the Admin Dashboard!'); window.location.href = 'index.php';</script>";
        }
      }
      else {
        echo "<script type='text/javascript'>alert('Please log in to view the Admin Dashboard!'); window.location.href = 'RegisterAndLogin.php';</script>";
      }
   ?>
</head>
<style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550pt}
    /* Set gray background color and 100% height */
    .sidenav {
        background-color: #f1f1f1;
        height: 100%;
    }
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
        .row.content {height: auto;} 
    }
</style>

<body>

<div class="sidebar">
  <h1><a href='index.php'>MyDiscussionForum</a></h1>
  <a href="adminDashboard.php">Dashboard</a>
  <a href="adminSearchUser.php">User Account Management</a>
  <a class="active" href="#">Edit / Remove Posts</a>
</div>

<!-- <nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Dashboard</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="adminDashboard.php">Dashboard</a></li>
        <li><a href="adminSearchUser.php">User Account Management</a></li>
        <li class="active"><a href="adminEditRemovePost.php">Edit / Remove Posts</a></li>
      </ul>
    </div>
  </div>
</nav>

  -->

<div class="container-fluid">
  <div class="row content">
        <div class="col-sm-6">
          <div class="well">
            <h4>Search Results</h4>
            <small>
            	<?php 
	            	$title = $_POST["title"];
	            	$opUsername = $_POST["opUsername"];
	            	$anonymousCommenting = $_POST["anonymousCommenting"];
	            	$ac = strlen($anonymousCommenting) > 0 ? " AND allowAnonymousComments = $anonymousCommenting;" : ";";

	                echo "Posts with titles similar to '$title' AND original poster's username similar to '$opUsername'.";
	             ?>
            </small><hr>
            
           <table>
           	<tr>
           		<th>Post ID</th>
           		<th>OP Username</th>
           		<th>Title</th>
           		<th>Date Posted</th>
           	</tr>
           		
           	<?php 
           		$query = "SELECT * FROM Posts, Users WHERE Posts.userId = Users.userId AND title LIKE '%$title%' AND username LIKE '%$opUsername%' $ac";
				$results = $PDO -> query($query);

				$thread = $results -> fetch();

				while ($thread != null) {
					echo "<tr>";
					
					echo "<td>" . "<a href='adminEditRemovePost_editPost.php?postID=" . $thread["postId"] . "'>" .  $thread["postId"] . "</a></td>";
					echo "<td>" . "<a href='adminEditRemovePost_editPost.php?postID=" . $thread["postId"] . "'>" . $thread["username"] . "</a></td>";
					echo "<td>" . "<a href='adminEditRemovePost_editPost.php?postID=" . $thread["postId"] . "'>" . $thread["title"] . "</a></td>";
					echo "<td>" . "<a href='adminEditRemovePost_editPost.php?postID=" . $thread["postId"] . "'>" . $thread["time"] . "</a></td>";
					
					echo "</tr>";

					$thread = $results -> fetch();
				}
           	 ?>
           </table>
           <a href="adminEditRemovePost.php"><button>Back to Search</button></a>
          </div>
        </div>
      </div>
      
</body>
</html>