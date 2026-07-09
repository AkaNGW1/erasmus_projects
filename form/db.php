<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "form";

$db = new mysqli($host, $user,$password,$database);

if(!$db) {
    echo "<h2>Connection Error</h2>". mysqli_connect_error();
}

?>