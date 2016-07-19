<?php

include 'connect.php';

mysqli_query($conn, "INSERT INTO `sandbox`.`children`
  (`first_name`, `last_name`, `age`, `height_inches`, `weight_pounds`, `digging_skill`, `packing_skill`, `has_temper_issues`, `favorite_color`, `allowed`)
  VALUES ('" . $_POST['first'] . "', '" . $_POST['last'] . "', '" . $_POST['age'] . "', '" . $_POST['height'] . "', '" . $_POST['weight'] . "', '" . $_POST['dig'] . "', '" . $_POST['pack'] . "', '" . ($_POST['temper'] === 'true' ? 1 : 0) . "', '" . $_POST['color'] .  "', '" . ($_POST['allowed'] === 'true' ? 1 : 0) . "');");

$id = mysqli_insert_id($conn);

$kick_out = '"kick-out">Kick Out';
$allow_in = '"allow-in">Allow In';

?>

<tr>
  <td><?= $_POST['first'] . " " . $_POST['last'] ?></td>
  <td><?= $_POST['age'] ?></td>
  <td><?= $_POST['height'] ?></td>
  <td><?= $_POST['weight'] ?></td>
  <td><?= $_POST['dig'] ?></td>
  <td><?= $_POST['pack'] ?></td>
  <td><?= ($_POST['temper'] === 'true' ? "Yes" : "No") ?></td>
  <td><?= $_POST['color'] ?></td>
  <td><button id="<?= $id ?>" class=<?= ($_POST['allow'] === 'true' ? $kick_out : $allow_in) ?></button></td>
</tr>
