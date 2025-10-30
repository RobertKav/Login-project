<?php
session_start();
include 'db_connect.php';

$username = $_SESSION["Student"];
$student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Students WHERE Username='$username'"));
$student_id = $student["StudentID"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $course_id = $_POST["CourseID"];
  mysqli_query($conn, "INSERT INTO registrations (StudentID, CourseID) VALUES ('$student_id', '$course_id')");
  echo "<script>alert('Course registration submitted! Waiting for approval.');</script>";
}
$courses = mysqli_query($conn, "SELECT * FROM Courses");
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
<select name="CourseID" required>
<option value="">Select a Course</option>
<?php while($row = mysqli_fetch_assoc($courses)) {
  echo "<option value='{$row['CourseID']}'>{$row['CourseName']} ({$row['CourseCode']})</option>";
} ?>
</select><br>
<button type="submit">Register</button>
</form>
<a href="student_dashboard.php">Back</a>
</body>
</html>