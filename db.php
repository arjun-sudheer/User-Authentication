<?php
$host = '172.31.22.43';
$username = 'Arjun200551705';
$password = '9T8bgMMQsI';
$database = 'Arjun200551705';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>