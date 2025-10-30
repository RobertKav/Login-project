<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $studentname = $_POST["studentname"];
  $email = $_POST["emailaddress"];
  $code = $_POST["coursecode"];

  $query = "INSERT INTO students (Username, Password, StudentName, EmailAddress, CourseCode)
            VALUES ('$username', '$password', '$studentname', '$email', '$code')";

  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Registration successful! Please login.'); window.location='index.php';</script>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Student Registration</h2>
<form method="POST">
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <input type="text" name="studentname" placeholder="Student Name" required><br>
  <input type="email" name="emailaddress" placeholder="Email Address" required><br>
  <input type="text" name="coursecode" placeholder="Course Code" required><br>
  <button type="submit">Register</button>
</form>
</body>
</html>