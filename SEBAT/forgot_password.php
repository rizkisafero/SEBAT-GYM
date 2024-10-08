<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <img src="images/logo.png" alt="Login Image">
        </div>
        <div class="login-form">
            <h2>Forgot Password</h2>
            <?php
            if (isset($_GET['error'])) {
                echo '<div class="error">'.htmlspecialchars($_GET['error']).'</div>';
            }
            ?>
            <form action="reset_password.php" method="POST">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit">Reset Password</button>
                <p><a href="index.php">Back to Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>