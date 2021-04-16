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
  <!-- Latest compiled JavaScript -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <style type="text/css">
  	table {
  		display: block;
  		margin-bottom: 1em;
  	}
  	td, th {
  		padding-left: 1em;
  	}

  </style>
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
        <li class="active"><a href="#">User Account Management</a></li>
        <li><a href="adminEditRemovePost.php">Edit / Remove Posts</a></li>
      </ul>
    </div>
  </div>
</nav>

  -->

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2><a href='index.php'>MyDiscussionForum</a></h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="adminDashboard.php">Dashboard</a></li>
        <li class="active"><a href="#">User Account Management</a></li>
        <li><a href="adminEditRemovePost.php">Edit / Remove Posts</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
        <h3>Edit / Remove / Enable / Disable Users</h3>
    </div>

    <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <h4>Search Results</h4>
            <small>
            	<?php 
                	$userID = $_POST["userID"];
                	$username = $_POST["username"];
                	$email = $_POST["email"];
                	$firstName = $_POST["firstName"];
                	$lastName = $_POST["lastName"];
                	$accountStatus = $_POST["accountStatus"];
                	$admin = $_POST["admin"];

                	$query = "UPDATE Users SET username = '$username', email = '$email', firstName = '$firstName', lastName = '$lastName', accountStatus = '$accountStatus', admin = $admin WHERE userId = $userID;";
                	$PDO -> exec($query);

					echo "<script type='text/javascript'>alert('User information has been updated!');window.location.href='adminSearchUser_editUser.php?userID=" . $userID . "';</script>";
	             ?>
            </small><hr>
          </div>
        </div>
      </div>
      
</body>
</html>