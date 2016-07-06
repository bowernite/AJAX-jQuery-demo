<?php

include 'connect.php';

parse_str($_SERVER['QUERY_STRING'], $qArray);
$query_str = "SELECT * FROM children";
if (!empty($qArray)) {
  $query_str .= " WHERE";
  foreach($qArray as $column => $value) {
    $query_str .= " " . $column . "=" . $value;
  }
}

$result = mysqli_query($conn, $query_str);

$kick_out = '"kick-out">Kick Out';
$allow_in = '"allow-in">Allow In';
while ($children = mysqli_fetch_array($result)) {
?>
<tr>
  <td><?= $children['first_name'] . " " . $children['last_name'] ?></td>
  <td><?= $children['age'] ?></td>
  <td><?= $children ['height_inches'] ?></td>
  <td><?= $children ['weight_pounds'] ?></td>
  <td><?= $children ['digging_skill'] ?></td>
  <td><?= $children ['packing_skill'] ?></td>
  <td><?= ($children ['has_temper_issues'] ? "Yes" : "No") ?></td>
  <td><?= $children ['favorite_color'] ?></td>
  <td><button id="<?= $children['id'] . '" class=' . ($children['allowed'] ? $kick_out : $allow_in) ?></button></td>
</tr>

<? }

mysqli_free_result($result);
?>
