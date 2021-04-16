<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>MyDiscussionForum</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/account.js"></script>
    </head>
    <header class="clearfix">
        <h1 class="clearfix">MyDiscussionForum</h1>
        
        <nav>
            <a href="index.php">Home</a>
            <a href="#">Search</a>
            <a href="new-thread.php">+ New Thread</a>
        </nav>

        <?php 
            session_start();
            $_SESSION["email"] = null;
         ?>

        <h2>Reset Password</h2>

    </header>
    <body>
        <div class = "Reset_form">
            <form method="POST" action="verify-password-reset.php">
                <fieldset>
                    <legend>Reset Password</legend>
                    <p>
                        <label>Email address:</label>
                        <input type = "email" id = "account_email" name = "account_email" placeholder = "Enter your email address" required />
                    </p>
                    <p>
                        <input type = "submit" value = "Confirm" />
                    </p>
                </fieldset>
            </form>
        </div>
        
    </body>
</html>