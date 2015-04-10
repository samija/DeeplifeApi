<?php
/**
 * Created by PhpStorm.
 * User: Sami
 * Date: 4/10/15
 * Time: 2:52 PM
 */
$servername = "localhost";
$username = "deeplife";
$password = "deeplife";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";