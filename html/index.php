<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if user is admin
    $adminQuery = "SELECT * FROM administrators WHERE username='$username' AND password='$password'";
    $adminResult = mysqli_query($conn, $adminQuery);

    if (mysqli_num_rows($adminResult) == 1) {
        $_SESSION["admin"] = $username;
        header("Location: admin_dashboard.php");
        exit;
    }

    // Check if user is student
    $studentQuery = "SELECT * FROM students WHERE username='$username' AND password='$password'";
    $studentResult = mysqli_query($conn, $studentQuery);

    if (mysqli_num_rows($studentResult) == 1) {
        $_SESSION["student"] = $username;
        header("Location: student_dashboard.php");
        exit;
    }

    $error = "Invalid username or password!";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Student Course Registration Portal</h2>
<form method="POST">
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="register.php">Register Here</a></p>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>