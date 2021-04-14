<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <?php 
      session_start();

      if ($_SESSION["loggedIn"]) {
        $host = "localhost";
        $database = "cosc360-project";
        $user = "root";
        $pwd = "";

        $PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

        $query = "SELECT admin FROM Users WHERE Users.userId = " . $_SESSION["userId"] . ";";
        $result = $PDO -> query($query);
        $admin = boolval($result -> fetch()["admin"]);


        if (!$admin) {
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

<nav class="navbar navbar-inverse visible-xs">
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
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="adminSearchUser.php">User Account Management/a></li>
        <li><a href="adminEditRemovePost.php">Edit / Remove Posts</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2><a href='index.php'>MyDiscussionForum</a></h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="">Dashboard</a></li>
        <li><a href="adminSearchUser.php">User Account Management</a></li>
        <li><a href="adminEditRemovePost.php">Edit / Remove Posts</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
        <h3>At a Glance</h3>
    </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Registered Users</h4>
            <p>
              <?php 
                  $query_registeredUsers =  "SELECT COUNT(Users.userId) AS REGISTERED_USERS FROM Users;";
                  $results = $PDO -> query($query_registeredUsers);

                  echo $results -> fetch()["REGISTERED_USERS"];
               ?>
            </p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Posts</h4>
            <p>
              <?php 
                  $query_posts =  "SELECT COUNT(Posts.postId) AS POSTS FROM Posts;";
                  $results = $PDO -> query($query_posts);

                  echo $results -> fetch()["POSTS"];
               ?>
            </p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Total Thread Views</h4>
            <p>
              <?php 
                  $query_totalThreadViews =  "SELECT SUM(Posts.views) AS TOTAL_THREAD_VIEWS FROM Posts;";
                  $results = $PDO -> query($query_totalThreadViews);

                  $TOTAL_THREAD_VIEWS = $results -> fetch()["TOTAL_THREAD_VIEWS"];

                  if ($TOTAL_THREAD_VIEWS != null)
                    echo $TOTAL_THREAD_VIEWS;
                  else
                    echo "0";
               ?>
            </p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Total Thread Comments</h4>
            <p>
              <?php 
                  $query_totalThreadComments =  "SELECT COUNT(Comments.commentId) AS TOTAL_THREAD_COMMENTS FROM Comments;";
                  $results = $PDO -> query($query_totalThreadComments);

                  $TOTAL_THREAD_COMMENTS = $results -> fetch()["TOTAL_THREAD_COMMENTS"];

                  if ($TOTAL_THREAD_COMMENTS != null)
                    echo $TOTAL_THREAD_COMMENTS;
                  else
                    echo "0";
               ?>
            </p> 
          </div>
        </div>
</body>
</html>