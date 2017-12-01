<?php
/**
 * Created by PhpStorm.
 * User: Kavinda
 * Date: 12/1/2017
 * Time: 12:01 PM
 */
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname="boardima";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
