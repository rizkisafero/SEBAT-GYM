<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login_process.php" method="POST"> <!-- Arahkan ke login_process.php -->
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br> <!-- Input untuk username -->
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br> <!-- Input untuk password -->

        <input type="submit" value="Login"> <!-- Tombol submit -->
    </form>
</body>
</html>