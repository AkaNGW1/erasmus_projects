<?php

include "db.php";

$row = null;

// Check if the ID is received from view_students.php
if(isset($_GET['id'])){

    // Get the ID
    $id = $_GET['id'];

    // Retrieve the student's information using a prepared statement
    $sql = "SELECT * FROM students WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Store the student information
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    }else{
        echo "<h2>Student Not Found!</h2>";
        exit();
    }

    $stmt->close();
}

if(isset($_POST['delete'])){

    // Receive updated values
    $id = $_POST['id'];

    // SQL query to update the student using a prepared statement
    $sql = "DELETE FROM students WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);

    if($stmt->execute()){

        echo "<h2>Student Updated Successfully!</h2>";
        $row = null;

    }else{
        echo "<h2>Error: ".$db->error."</h2>";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
</head>
<body>

    <h2>Delete Student</h2>

    <?php if($row): ?>

    <p>Are you sure you want to delete <strong><?php echo htmlspecialchars($row['fullname']);?></strong> (Student ID: <?php echo htmlspecialchars($row['student_id'])?>)</p>

    <form method="post">

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']);?>">

        <input type="submit" name="delete" value="Delete Student">

    </form>

    <?php elseif(!isset($_POST['delete'])): ?>

    <p>No student selected. Go to <a href="view_students.php">View Students</a> and click Delete next to a student.</p>

    <?php endif; ?>

    <a href="dashboard.php">Back to Dashboard</a>

</body>
</html>

<?php
$db->close();
?>