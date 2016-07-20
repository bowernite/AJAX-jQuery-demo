<?php

include 'connect.php';

$id = $_POST['id'];
$action = $_POST['action'];
$q = "SELECT * FROM children WHERE id=" . $id;
$result = mysqli_query($conn, $q);
$child = mysqli_fetch_array($result);
$q = "UPDATE children SET allowed=NOT allowed WHERE id=" . $id;

    // If trying to include an item already included, return false for javascript handling
if ($action == "allow-in" && $child['allowed']) {
  echo false;
} elseif ($action == "kick-out") {
  mysqli_query($conn, $q);
  echo "remove";
} else {
  mysqli_query($conn, $q); ?>
  <li><span class="name"><?= $child['last_name'] . ", " . $child['first_name'] ?></span>
    <div class="adder-btn true" id="<?= $id ?>"><</div>
  </li>
<? }

mysqli_free_result($result); ?>
