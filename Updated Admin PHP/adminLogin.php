<!DOCTYPE html>    
<html>    
<head>    
    <title>Web Admin Login</title>    
    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">    
    <script type="text/javascript" src="script/adminLogin.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>    
<body>    
    <h2>Web Admin Login</h2><br>    
    <div class="login">    
    <form id="login" method="get" action="adminDashboard.php">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="Uname" id="Uname" placeholder="">   
        <br><br>    
        <label><b>Password</b>    
        </label>    
        <input type="Password" name="Pass" id="Pass" placeholder="">
        <br><br> 
        <input type="submit" name="log" id="log" value="Log In">       
        <br><br>      
    </form>     
</div>    
</body>    
</html>    