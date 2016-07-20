<!doctype HTML>
<html>
<head>
  <title>Sandbox</title>
  <? include $_SERVER['DOCUMENT_ROOT'] . '/meta.php' ?>
</head>

<body>

<h1>SANDBOX</h1>
<h2>Database</h2>

<button class="toggle-view">Toggle Table View</button><br/><br/>

<div class="adder-view">

  <div class="message error hidden"><h3>Child already included!</h3></div>
  <div class="message success include hidden"><h3>Operation successful!</h3></div>

  <div class="all-children">
    <h3>ALL CHILDREN</h3>
    <ul></ul>
  </div>

  <div class="included">
    <h3>INCLUDED</h3>
      <ul class="initial"></ul>
    <h3 id="new-add">NEWLY ADDED</h3>
      <ul class="new-adds"></ul>
  </div>

</div>



<div class="table-view hidden">

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
      <tr><form id="new-child">
        <td><input type="text" name="first" id="first_name" placeholder="First" /><input type="text" name="last" id="last_name" placeholder="Last"/></td>
        <td><input name="age" id="age" type="text" /></td>
        <td><input name="height" id="height" type="text" /></td>
        <td><input name="weight" id="weight" type="text" /></td>
        <td><input name="dig" id="digging" type="text" /></td>
        <td><input name="pack" id="pack" type="text" /></td>
        <td><input name="temper" id="temper" type="checkbox" /></td>
        <td><input name="color" id="color" type="text" /></td>
        <td><input name="allow" id="allow" type="checkbox"></td>
        <td><input type="submit" value="Submit New Child"></td>
      </form></tr>
    </tfoot>

  </table>

</div>

<div class="debug">

</div>

</body>
</html>
