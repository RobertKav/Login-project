<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Welcome, Admin!</h2>
<ul>
  <li><a href="add_course.php">Add New Course</a></li>
  <li><a href="approve_registration.php">Approve/Remove Registrations</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</body>
</html>
