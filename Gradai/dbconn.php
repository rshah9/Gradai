<?php
header("Cache-Control: no-cache");
$servername = "localhost";
$username = "u759916899_gradaiadmin";
$password = "Atomsk101";
$dbname = "u759916899_gradai";
$conn = new mysqli($servername,$username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>