<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
        <a href="add.php">Add Student</a> |
        <a href="view.php">View Students</a>
    </nav>
</header>

<h2>Add New Student</h2>

<?php
if (isset($_POST['submit'])) {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $grade = htmlspecialchars(trim($_POST['grade']));

    // Prepare and insert data
    $sql = "INSERT INTO students (name, email, grade) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $grade);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Student added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<form method="POST" action="add.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="grade">Grade:</label>
    <input type="text" id="grade" name="grade" required><br>

    <input type="submit" name="submit" value="Add Student">
</form>

<footer>
    <p>© 2025 Student Records</p>
</footer>
</body>
</html>
