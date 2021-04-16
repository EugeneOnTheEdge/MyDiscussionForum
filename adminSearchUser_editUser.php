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
  <class="active"><a href="#">Search Users</a>
  <a href="adminSearchUser.php">User Account Management</a>
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
                $userID = $_GET["userID"];
              
                  echo "Edit user information";
               ?>
            </small><hr>
            
           <table>
            <tr>
              <th>User ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Account Status</th>
              <th>Admin</th>
            </tr>
              
            <?php 
              $query = "SELECT * FROM Users WHERE userId = $userID;";
              $results = $PDO -> query($query);

              $user = $results -> fetch();
              
              echo "<form id='form-user' method='POST' action='admin_editUser.php'>";
              echo "<tr><td><input name='userID' type='text' readonly value='" .  $user["userId"] . "' style='background-color:rgb(230,230,230);'></td>";
              echo "<td>" . "<input name='username' value='" . $user["username"] . "'></td>";
              echo "<td>" . "<input name='email' value='" . $user["email"] . "'></td>";
              echo "<td>" . "<input name='firstName' value='" . $user["firstName"] . "'></td>";
              echo "<td>" . "<input name='lastName' value='" . $user["lastName"] . "'></td>";
              
              if ($user["accountStatus"] == "ACTIVE")
                echo "<td><select name='accountStatus'><option value='ACTIVE'>ACTIVE</option><option value='DISABLED'>DISABLE</option></select></td>";
              else
                echo "<td><select name='accountStatus'><option value='DISABLE'>DISABLED</option><option value='ACTIVE'>ACTIVATE</option></select></td>";

              if (boolval($user["admin"]))
                echo "<td><select name='admin'><option value='1'>YES</option><option value='0'>REMOVE ADMIN PRIVILEGES</option></select></td>";
              else
                echo "<td><select name='admin'><option value='0'>NO</option><option value='1'>GRANT ADMIN PRIVILEGES</option></select></td>";
              echo "</tr></form>";
             ?>            
           </table>
           <button onclick='document.getElementById("form-user").submit();'><b>Save</b></button>
           <a href="adminSearchUser.php"><button>Back to Search</button></a>
          </div>
        </div>
      </div>
      
</body>
</html>