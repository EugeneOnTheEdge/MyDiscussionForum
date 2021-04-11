<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Register or Log-in</title>
        <script type="text/javascript" src="js/account.js"></script>
    </head>
    <header>
        <h1>Register for an account or Log-in to your account</h1>
    </header>
    <body>
        <div class = "Registration_form" style = "width:50%; float:left">
            <form method="POST" action="register-user.php">
                <fieldset>
                    <legend>Create Account</legend>
                    <p>
                        <label>First name:</label>
                        <input type = "text" id = "account_firstname" name = "account_firstname" placeholder = "Enter your first name" required/>
                    </p>
                    <p>
                        <label>Last name:</label>
                        <input type = "text" id = "account_lastname" name = "account_lastname" placeholder = "Enter your last name" required/>
                    </p>
                    <p>
                        <label>Username:</label>
                        <input type = "text" id = "account_name" name = "account_username" placeholder = "Enter your username" required/>
                    </p>
                    <p>
                        <label>Email address:</label>
                        <input type = "email" id = "account_email" name = "account_email" placeholder = "Enter your email address" required/>
                    </p>
                    <p>
                        <label>Create password:</label>
                        <input type = "password" id = "account_password" name = "account_password" placeholder = "Enter your password" required/>
                    </p>
                    <p>
                        <label>Confirm password:</label>
                        <input type = "password" id = "confirm_password" name = "confirm_password" placeholder = "Re-enter your password" required/>
                    </p>
                    <p>
                        <label>Profile Picture:</label>
                        <input type ="file" id = "profile_picture" name = "profile_picture" accept = "image/*" >
                    </p>
                    <hr>
                    <h3>Just in case you forget your password...</h3>
                    <p>
                        <label>Write your security question:</label>
                        <input type="text" name="security-question" maxlength="50" required>
                    </p>
                    <p>
                        <label>Answer to security question:</label>
                        <input type="text" maxlength="50" name="security-answer" required>
                    </p>
                    <hr>
                    <p>
                        <input type = "submit" value = "Register"/>
                    </p>
                </fieldset>
            </form>
        </div>
        <div class = "Login_form" style = "width:50%; float:right">
            <form method="POST" action="authenticate-user.php">
                <fieldset>
                    <legend>Log-In</legend>
                    <p>
                        <label>Username:</label>
                        <input type = "text" id = "account_name" name = "account_username" placeholder = "Enter your username" required/> 
                    </p>
                    <p>
                        <label>Password:</label>
                        <input type = "password" id = "account_password" name = "account_password" placeholder = "Enter your password" required/>
                    </p>
                    <p>
                        <input type = "submit" value = "Log-in"/>
                    </p>
                    <p>
                        <a href="ResetPassword.php">Forgot your password?</a>
                    </p>
                </fieldset>
            </form>
        </div>
    </body>
</html>