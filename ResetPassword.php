<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Reset Password</title>
        <script type="text/javascript" src="js/account.js"></script>
    </head>
    <header>
        <h1>Reset Password</h1>
        <?php 
            session_start();
            $_SESSION["email"] = null;
         ?>
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