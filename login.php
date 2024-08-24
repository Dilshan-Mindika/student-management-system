<?php
include 'connection.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        
        // Redirect to display.php on successful login
        header('Location: display.php');
        exit(); // Stop script execution after redirection
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Login | Student Management System</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f7f9fc;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login-container h1 {
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            font-weight: bold;
            text-align: center;
        }
        .form-control {
            border-radius: 25px;
        }
        .btn-primary {
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            width: 100%;
        }
        .form-text {
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Username or Email</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username or email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <?php if (isset($error)): ?>
                <p class="text-danger form-text"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
