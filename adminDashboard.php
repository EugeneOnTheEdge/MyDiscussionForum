<!DOCTYPE html>
<html>
<head>
<title>MyDiscussionForum</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href = "css/adminStyle.css">
<link rel="stylesheet" href = "css/style.css">

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


<body>

<div class="sidebar">
<h1><a href='index.php'>MyDiscussionForum</a></h1>
  <class="active"><a href="#">Dashboard</a>
  <a href="adminSearchUser.php">Search Users</a>
  <a href="adminEnableDisableUser.php">Enable / Disable Users</a>
  <a href="adminEditRemovePost.php">Edit / Remove Posts</a>
</div>

<div class="content">
  <h2>Dashboard</h2>
  <h4>Registered Users</h4>
</div>
              <?php 
                  $query_registeredUsers =  "SELECT COUNT(Users.userId) AS REGISTERED_USERS FROM Users;";
                  $results = $PDO -> query($query_registeredUsers);

                  echo $results -> fetch()["REGISTERED_USERS"];
               ?>
            </p> 
          </div>
        </div>
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