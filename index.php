<?

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

?>

<!doctype HTML>
<html>
<head>
  <title>Sandbox</title>
  <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <!-- <script type="text/javascript" src="/path/to/jquery.tablesorter.js"></script> -->
  <script type="text/javascript" src="script.js"></script>
  <script type="text/javascript" src="sortable.js"></script>

  </script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- <link rel="icon" type="image/png" href="http://images.clipartpanda.com/sandbox-icon-google-sandbox-1403870597.png"> -->
</head>
<body>

<h1>SANDBOX</h1>
<h2>Database</h2>

<button class="query" id="show-all">Show All Prospects</button>
<button class="query" id="show-temper">Show Temper Issues</button>

<table id="children" class="sortable">

  <thead>
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>Height</th>
      <th>Weight</th>
      <th>Digging Skill</th>
      <th>Packing Skill</th>
      <th>Temper Issues</th>
      <th>Favorite Color</th>
      <th>Allowed</th>
    </tr>
  </thead>

  <tbody></tbody>

  <tfoot>
    <tr id="new-child"><form id="new-child">
      <td><input type="text" id="first_name" placeholder="First" /><input type="text" id="last_name" placeholder="Last"/></td>
      <td><input type="text" id="age" /></td>
      <td><input type="text" id="height_inches" /></td>
      <td><input type="text" id="weight_pounds" /></td>
      <td><input type="text" id="digging_skill" /></td>
      <td><input type="text" id="packing_skill" /></td>
      <td><input type="checkbox" id="has_temper_issues" /></td>
      <td><input type="text" id="favorite_color" /></td>
      <td><input type="checkbox" id="allowed" /></td>
      <td><input class="add-hidden" type="submit" value="Submit New Child"></td>
    </form></tr>
  </tfoot>

</table>

<div class="debug">

</div>

</body>
</html>
