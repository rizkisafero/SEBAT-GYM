<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <img src="images/logo.png" alt="Login Image">
        </div>
        <div class="login-form">
            <h2>Login</h2>
            <?php
            if (isset($_GET['error'])) {
                echo '<div class="error">'.htmlspecialchars($_GET['error']).'</div>';
            }
            ?>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
                <p><a href="forgot_password.php">Forgot Password?</a></p>
                <p><a href="register.php">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>
