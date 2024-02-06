<?php
session_start();

// Change these variables with your database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "location_insertion";

$conn = mysqli_connect($hostname, $username, $password, $database);

if ($conn) {
    echo "connected";
} else {
    echo "failed";
}