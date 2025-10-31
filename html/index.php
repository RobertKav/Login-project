<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["UserName"];
    $password = $_POST["Password"];

    // Check if user is admin
    $adminQuery = "SELECT * FROM Administrators WHERE UserName='$username' AND Password='$password'";
    $adminResult = mysqli_query($conn, $adminQuery);

    if (mysqli_num_rows($adminResult) == 1) {
        $_SESSION["Admin"] = $username;
        header("Location: admin_dashboard.php");
        exit;
    }

    // Check if user is student
    $studentQuery = "SELECT * FROM Students WHERE UserName='$username' AND Password='$password'";
    $studentResult = mysqli_query($conn, $studentQuery);

    if (mysqli_num_rows($studentResult) == 1) {
        $_SESSION["Student"] = $username;
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
  <input type="text" name="UserName" placeholder="User Name" required><br>
  <input type="password" name="Password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="register.php">Register Here</a></p>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>