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
  <a href="adminSearchUser.php">Search Users</a>
  <class="active"><a href="#">User Account Management</a>
  <a href="adminEditRemovePost.php">Edit / Remove Posts</a>
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
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>MyDiscussionForum</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="adminDashboard.php">Dashboard</a></li>
        <li><a href="adminSearchUser.php">User Account Management</a></li>
        <li class="active"><a href="adminEditRemovePost.php">Edit / Remove Posts</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
        <h3>Edit / Remove Posts</h3>
    </div>

    <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <h4>Search Results</h4>
            <small>
            	<?php 
	            	$postID = $_GET["postID"];
                $GLOBALS["postID"] = $postID;
	             ?>
            </small><hr>
            
           <table>
           	<tr>
           		<th>Post ID</th>
           		<th>OP Username</th>
           		<th>Title</th>
           		<th>Content</th>
              <th>Allow Anonymous Commenting</th>
           	</tr>
           		
           	<?php 
              $query = "SELECT * FROM Posts, Users WHERE Posts.userId = Users.userId AND postId = $postID;";
              $results = $PDO -> query($query);

              $post = $results -> fetch();
              
              echo "<form id='form-post' method='POST' action='admin_editPost.php'>";
              echo "<tr><td><input name='postID' type='text' readonly value='" .  $post["userId"] . "' style='background-color:rgb(230,230,230);'></td>";
              echo "<td><input name='opUsername' type='text' readonly value='" . $post["username"] . "' style='background-color:rgb(230,230,230);'></td>";
              echo "<td>" . "<input name='title' value='" . $post["title"] . "'></td>";
              echo "<td>" . "<textarea name='content'>" . $post["content"] . "</textarea></td>";
              
              if (boolval($post["allowAnonymousComments"]))
                echo "<td><select name='anonymousComment'><option value='1'>YES</option><option value='0'>NO</option></select></td>";
              else
                echo "<td><select name='anonymousComment'><option value='0'>NO</option><option value='1'>YES</option></select></td>";

              echo "</tr></form>";
           	 ?>
           </table>
           <button onclick='document.getElementById("form-post").submit();'><b>Save</b></button>
           <a href="adminEditRemovePost.php"><button>Back to Search</button></a>
           <?php echo "<a href='admin_removePost.php?postID=" . $GLOBALS["postID"] . "&confirmDelete=0'><button>Remove Post</button></a>"; ?>
           </a>
          </div>
        </div>
      </div>
      
</body>
</html>