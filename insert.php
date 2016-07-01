<?php

$servername = "localhost";
$username = "root";
$password = "Bb240824!";
$dbName = "sandbox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$ret = "<tr>";
$ret .= "<td>" . $_POST['first_name'] . $_POST['last_name'] . "</td>";
$ret .= "<td>" . $_POST['height_inches'] . "</td>";
$ret .= "<td>" . $_POST['weight_pounds'] . "</td>";
$ret .= "<td>" . $_POST['height_inches'] . "</td>";
$ret .= "<td>" . $_POST['height_inches'] . "</td>";
$ret .= "<td>" . $_POST['height_inches'] . "</td>";
$ret .= "<td>" . $_POST['height_inches'] . "</td>";


?>
