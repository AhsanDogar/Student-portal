<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <img src="img/logo.png" alt="Logo" height="50">
    <nav>
        <a href="add.php">Add Student</a> |
        <a href="view.php">View Students</a>
    </nav>
</header>

<h2>All Student Records</h2>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Grade</th>
    </tr>

<?php
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".htmlspecialchars($row['name'])."</td>
                <td>".htmlspecialchars($row['email'])."</td>
                <td>".htmlspecialchars($row['grade'])."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No records found</td></tr>";
}
?>

</table>

<footer>
    <p>© 2025 Student Records</p>
</footer>
</body>
</html>
