<?php
session_start();
if (!isset($_SESSION["Student"])) {
    header("Location: index.php");
    exit;
}
include 'db_connect.php';
$username = $_SESSION["Student"];
$student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Students WHERE UserName='$username'"));
$student_id = $student["StudentID"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Welcome, <?php echo $student['StudentName']; ?>!</h2>
<ul>
  <li><a href="register_course.php">Register for a Course</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</body>
</html>