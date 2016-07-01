<?php

$servername = "localhost";
$username = "sandboxdb2";
$password = "sandboxpw";
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
parse_str($q, $qArray);
$queryString = "SELECT * FROM children";
if (!empty($qArray)) {
  $queryString .= " WHERE";
  foreach($qArray as $column => $value) {
    $queryString .= " " . $column . "=" . $value;
  }
}

$result = mysqli_query($conn, $queryString);

$kick_out = "'kick-out'>Kick Out";
$allow_in = "'allow-in'>Allow In";

$ret = "";

while ($children = mysqli_fetch_array($result)) {
   $ret .= "<tr>";
   $ret .= "<td>". $children['first_name'] . " " . $children['last_name'] . "</td>";
   $ret .= "<td>". $children ['age'] . "</td>";
   $ret .= "<td>". $children ['height_inches'] . "</td>";
   $ret .= "<td>". $children ['weight_pounds'] . "</td>";
   $ret .= "<td>". $children ['digging_skill'] . "</td>";
   $ret .= "<td>". $children ['packing_skill'] . "</td>";
   $ret .= "<td>". ($children ['has_temper_issues'] ? "Yes" : "No") . "</td>";
   $ret .= "<td>". $children ['favorite_color'] . "</td>";
   $ret .= "<td><button id='" . $children['id'] . "' class=" . ($children['allowed'] ? $kick_out : $allow_in) . "</button></td>";
   $ret .= "</tr>";
}

echo $ret;

// mysqli_free_result($result);

?>
