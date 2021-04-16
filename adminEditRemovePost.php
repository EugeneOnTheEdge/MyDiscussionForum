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
  <link rel="stylesheet" href = "css/adminStyle.css">
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
</nav> -->

<div class="sidebar">
  <h1><a href='index.php'>MyDiscussionForum</a></h1>
  <a href="adminDashboard.php">Dashboard</a>
  <a href="adminSearchUser.php">Search Users</a>
  <!-- <a href="adminEndableDisableUser.php">Enable / Disable Users</a> -->
  <class="active"><a href="#">Edit / Remove Posts</a>
</div>

<div class = "content">
<div class="well">
    <h4>Start by searching for posts</h4>
    <hr>
    <form method="POST" action="adminEditRemovePost_results.php">
        <table>
          <tr>
            <td><label>Title</label></td>
            <td><input type="text" name="title" placeholder="ALL"></td>
          </tr>
          <tr>
            <td><label>Original Poster Username</label></td>
            <td><input type="text" name="opUsername" placeholder="ALL"></td>
          </tr>
          <tr>
            <td><label>Allow anonymous commenting</label></td>
            <td>
              <select name="anonymousCommenting">
                <option value="">ALL</option>
                <option value="1">YES</option>
                <option value="0">NO</option>
              </select>
            </td>
          </tr>
          
          <tr colspan="2">
          <td><input type="submit" value="Search"></td>
          </tr>
        </table>
      </form>
  </div>
</div>


<!-- <div class="container-fluid">
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
    
    <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Start by searching for posts</h4>
            <hr>
            <form method="POST" action="adminEditRemovePost_results.php">
               <table>
                 <tr>
                   <td><label>Title</label></td>
                   <td><input type="text" name="title" placeholder="ALL"></td>
                 </tr>
                 <tr>
                   <td><label>Original Poster Username</label></td>
                   <td><input type="text" name="opUsername" placeholder="ALL"></td>
                 </tr>
                  <tr>
                   <td><label>Allow anonymous commenting</label></td>
                   <td>
                      <select name="anonymousCommenting">
                        <option value="">ALL</option>
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                      </select>
                    </td>
                 </tr>
                 
                 <tr colspan="2">
                  <td><input type="submit" value="Search"></td>
                 </tr>
               </table>
             </form>
          </div>
        </div>
      </div> -->
</body>
</html>