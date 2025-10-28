<?php
session_start();
include 'db_connect.php';

// Ensure only admins can access this page
if (!isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit;
}

// Approve or remove registration
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    mysqli_query($conn, "UPDATE registrations SET status='Approved' WHERE registration_id=$id");
}
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM registrations WHERE registration_id=$id");
}

// Fetch all registrations
$query = "SELECT r.registration_id, s.full_name AS student, c.course_name AS course, r.status, r.date_registered
          FROM registrations r
          JOIN students s ON r.student_id = s.student_id
          JOIN courses c ON r.course_id = c.course_id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Approve or Remove Registrations</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Course Registrations</h2>
<table border="1" align="center" cellpadding="10">
<tr>
  <th>Student</th>
  <th>Course</th>
  <th>Status</th>
  <th>Date Registered</th>
  <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?php echo $row['student']; ?></td>
  <td><?php echo $row['course']; ?></td>
  <td><?php echo $row['status']; ?></td>
  <td><?php echo $row['date_registered']; ?></td>
  <td>
    <?php if ($row['status'] == 'Pending') { ?>
      <a href="?approve=<?php echo $row['registration_id']; ?>">Approve</a> |
    <?php } ?>
    <a href="?remove=<?php echo $row['registration_id']; ?>">Remove</a>
  </td>
</tr>
<?php } ?>
</table>

<br>
<a href="admin_dashboard.php">Back to Dashboard</a>
</body>
</html>