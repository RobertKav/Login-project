<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $program = $_POST["program"];

  $query = "INSERT INTO students (username, password, full_name, email, program)
            VALUES ('$username', '$password', '$fullname', '$email', '$program')";

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
  <input type="text" name="fullname" placeholder="Full Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="text" name="program" placeholder="Program" required><br>
  <button type="submit">Register</button>
</form>
</body>
</html>