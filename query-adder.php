<?php

include 'connect.php';

$q = $_SERVER['QUERY_STRING'];
$query_str = "SELECT * FROM children";
$query_str .= ($q == 'true' ? " WHERE allowed=true" : "");
$query_str .= " ORDER BY last_name";

$result = mysqli_query($conn, $query_str);

while ($child = mysqli_fetch_array($result)) { ?>
  <li><?= $child['last_name'] . ", " . $child['first_name'] ?>
    <div class="adder-btn <?= $q ?>" id="<?= $child['id'] ?>">
      <?= $q == 'true' ? "<" : ">" ?>
    </div>
  </li>
<? }

mysqli_free_result($result); ?>
