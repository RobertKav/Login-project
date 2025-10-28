<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $code = $_POST["code"];
  $name = $_POST["name"];
  $desc = $_POST["desc"];
  $credits = $_POST["credits"];
  $lecturer = $_POST["lecturer"];

  $query = "INSERT INTO courses (course_code, course_name, description, credits, lecturer)
            VALUES ('$code', '$name', '$desc', '$credits', '$lecturer')";
  mysqli_query($conn, $query);
  echo "<script>alert('Course added successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Course</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Add New Course</h2>
<form method="POST">
  <input type="text" name="code" placeholder="Course Code" required><br>
  <input type="text" name="name" placeholder="Course Name" required><br>
  <textarea name="desc" placeholder="Description"></textarea><br>
  <input type="number" name="credits" placeholder="Credits" required><br>
  <input type="text" name="lecturer" placeholder="Lecturer" required><br>
  <button type="submit">Add Course</button>
</form>
<a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>