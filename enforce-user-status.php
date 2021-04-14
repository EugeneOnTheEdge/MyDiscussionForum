<?php 
	/*
	*	THIS IS A PHP FILE THAT SHOULD BE INCLUDED IN EVERY PHP FILES. 
	*	IT CHECKS IF A USER IS SIGNED IN, IS AN ADMIN, AND ALSO CHECKS IF THEIR ACCOUNT IS ACTIVE/DISABLED.
	*/
	session_start();

	if (sizeof($_SESSION) == 0) {
		$_SESSION["loggedIn"] = false;
		$_SESSION["username"] = null;
		$_SESSION["userId"] = null;
		$_SESSION["firstName"] = null;
	}

	if ($_SESSION["loggedIn"]) {
        $host = "localhost";
        $database = "cosc360-project";
        $user = "root";
        $pwd = "";

        $PDO = new PDO("mysql: host=localhost ; dbname=cosc360-project", $user, $pwd);

        $query = "SELECT * FROM Users WHERE Users.userId = " . $_SESSION["userId"] . ";";
        $result = $PDO -> query($query);

        $user = $result -> fetch();

        $admin = boolval($user["admin"]);
        $accountStatus = $user["accountStatus"];

        $_SESSION["admin"] = $admin;
        $_SESSION["accountStatus"] = $accountStatus;

		echo "<a href=\"sign-out.php\" id=\"sign-in-button\">Sign Out</a>";
		
		if ($_SESSION["accountStatus"] == "DISABLED") {
			echo "<script type='text/javascript'>alert('Uh oh, your account has been disabled by our moderators. Please contact our admins.');window.location.href = 'sign-out.php';</script>";

			exit(); // do not execute other php scripts within the file
		}

        if ($admin) 
          echo "<a href='adminDashboard.php'>Admin Dashboard</a>";
    }
    else {
		echo "<a href=\"RegisterAndLogin.php\" id=\"sign-in-button\">Sign In / Sign Up</a>";
	}
 ?>