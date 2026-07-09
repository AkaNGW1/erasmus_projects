<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;

            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            width: 300px;
            border: 1px solid #ccc;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        h3 {
            color: #666;
            margin-bottom: 20px;
        }

        a {
            display: block;
            background-color: #e0e0e0;
            color: black;
            padding: 10px;
            margin-bottom: 10px;
            text-decoration: none;
            text-align: center;
        }

        a:hover {
            background-color: #d0d0d0;
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Student</h2>

    <h3>Dashboard</h3>

    <a href="register.html">Register Student</a>

    <a href="view_students.php">View Students</a>

    <a href="search.php">Search Student</a>

    <a href="update.php">Update Student</a>

    <a href="delete.php">Delete Students</a>

    <a href="login.html">Logout</a>
</div>
    
</body>
</html>