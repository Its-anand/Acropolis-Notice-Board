<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "account";
$con = new mysqli($server, $username, $password, $db);
mysqli_set_charset($con, "utf8");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully";
?>