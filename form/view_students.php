<?php

include "db.php";

if (isset($_POST['student_id']) && $_POST['student_id'] != "") {

    $student_id = $_POST['student_id'];

    $sql = "SELECT * FROM students WHERE student_id = '$student_id'";

} else {
    $sql = "SELECT * FROM students";
}

$result = $db -> query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Students</title>

    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;
            
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            background-color: white;
            padding: 20px;
            width: 100%;
            max-width: 800px;
            border: 1px solid #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #e0e0e0;
            color: black;
        }

        form {
            text-align: center;
        }
    </style>

</head>
<body>

    <h2>Student List</h2>

    <form method="POST">
        <label for="">Search by Student ID</label><br><br>
        <input type="text" name="student_id">
        <input type="submit" value="Search"><br><br>
    </form>

    <table>

        <tr>
            <th>Full Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Semester</th>
        </tr>

    <?php

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
        

    ?>

    <tr>
        <td><?php echo $row['fullname'];?></td>
        <td><?php echo $row['student_id'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['department'];?></td>
        <td><?php echo $row['semester'];?></td>
        <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>

    <?php
    
        }
    }else {


    ?>

    <tr>
        <td clospan="6">No Students Found</td>
    </tr>

    <?php
    
    }

    $db->close();
    
    ?>

    </table>

    <br>

    <a href="dashboard.php">Back to Dashboard</a>
    
</body>
</html>

