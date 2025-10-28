<?php
session_start();
if (!isset($_SESSION["student"])) {
    header("Location: index.php");
    exit;
}
include 'db_connect.php';
$username = $_SESSION["student"];
$student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE username='$username'"));
$student_id = $student["student_id"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Welcome, <?php echo $student['full_name']; ?>!</h2>
<ul>
  <li><a href="register_course.php">Register for a Course</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</body>
</html>