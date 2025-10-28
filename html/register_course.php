<?php
session_start();
include 'db_connect.php';

$username = $_SESSION["student"];
$student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE username='$username'"));
$student_id = $student["student_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $course_id = $_POST["course_id"];
  mysqli_query($conn, "INSERT INTO registrations (student_id, course_id) VALUES ('$student_id', '$course_id')");
  echo "<script>alert('Course registration submitted! Waiting for approval.');</script>";
}
$courses = mysqli_query($conn, "SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
<title>Register Course</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Register for a Course</h2>
<form method="POST">
<select name="course_id" required>
<option value="">Select a Course</option>
<?php while($row = mysqli_fetch_assoc($courses)) {
  echo "<option value='{$row['course_id']}'>{$row['course_name']} ({$row['course_code']})</option>";
} ?>
</select><br>
<button type="submit">Register</button>
</form>
<a href="student_dashboard.php">Back</a>
</body>
</html>