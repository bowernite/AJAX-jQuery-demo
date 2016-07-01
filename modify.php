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



// echo "  <tr> <th>Name</th> <th>Age</th> <th>Height</th> <th>Weight</th> <th>Digging Skill</th>
//             <th>Packing Skill</th> <th>Temper Issues</th> <th>Favorite Color</th>
//         </tr>";

$q = $_SERVER['QUERY_STRING'];
$queryString = "UPDATE children SET allowed=NOT allowed WHERE id=" . $q;
$result = mysqli_query($conn, $queryString);

// mysqli_free_result($result);

?>
