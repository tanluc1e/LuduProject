<?php

$conn = new mysqli('localhost', 'tanluc1', 'tanluc1', 'shikoba');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>