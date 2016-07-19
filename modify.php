<?php

include 'connect.php';


$q = $_SERVER['QUERY_STRING'];
$queryString = "UPDATE children SET allowed=NOT allowed WHERE id=" . $q;
$result = mysqli_query($conn, $queryString);

// mysqli_free_result($result);

?>
