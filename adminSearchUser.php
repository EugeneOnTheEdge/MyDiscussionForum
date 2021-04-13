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
        <li><a href="adminDashboard.php">Dashboard</a></li>
        <li class="active"><a href="#">User Account Management</a></li>
        <li><a href="adminEditRemovePost.php">Edit / Remove Posts</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>MyDiscussionForum</h2>
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
        <div class="col-sm-3">
          <div class="well">
            <h4>Start by searching for users</h4>
            <form method="POST" action="adminSearchUser_results.php">
               <table>
                 <tr>
                   <td><label>Username</label></td>
                   <td><input type="text" name="username"></td>
                 </tr>
                 <tr>
                   <td><label>Email</label></td>
                   <td><input type="text" name="email"></td>
                 </tr>
                 <tr>
                   <td><label>First Name</label></td>
                   <td><input type="text" name="firstName"></td>
                 </tr>
                 <tr>
                    <td><label>Last Name</label></td>
                    <td><input type="text" name="lastName"></td>
                 </tr>
                 <tr>
                   <td><label>Account Status</label></td>
                   <td>
                     <select>
                       <option value="">ANY</option>
                       <option value="ACTIVE">ACTIVE</option>
                       <option value="DISABLED">DISABLED</option>
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
      </div>
      
</body>
</html>