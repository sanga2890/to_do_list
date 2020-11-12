<?php
include 'list.php';
echo "<form method='post'>";
echo "<select name='Actions'>";
echo "<option value ='all'>";
echo "All";
echo "</option>";
echo "<option value ='true'>";
echo "Complete";
echo "</option>";
echo "<option value = ";
echo false;
echo ">";
echo "To Do";
echo "</option>";
echo "</select>";
echo "<input type='submit' name='submit' value='Submit'>";
echo "</form>";

if(isset($_POST['submit'])){
   if(!empty($_POST['Actions'])) {
       $selected = $_POST['Actions'];
        var_dump($selected);
       }
   }

$status = false;
var_dump($status);
$field = 'priority';
$filter = [];
foreach ($list as $originalKey => $item) {
  if ($selected === 'all' || $item['complete'] == $selected) {
    if (isset($field) && isset($item[$field])){
    $filter[$originalKey] = $item[$field];
  } else {
      $filter[$originalKey] = $item['priority']+12;
    }
  }
}

asort($filter);
echo "<table>";
echo "<tr>";
echo "<th>Title</th>";
echo "<th>Priority</th>";
echo "<th>Due Date</th>";
echo "<th>Complete</th>";
echo "</tr>";
foreach ($filter as $id => $value) {
    echo "<tr>";
    echo "<td>" . $list[$id]['title'] . "</td>";
    echo "<td>" . $list[$id]['priority'] . "</td>";
    echo "<td>" . $list[$id]['due'] . "</td>";
    echo "<td>";
    if ($list[$id]['complete']) {
      echo "Yes";
    } else {
      echo "No";
    }
    echo "</td>";
    echo "</tr>";
}
echo "</table>";


?>
