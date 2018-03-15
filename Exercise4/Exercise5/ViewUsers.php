<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "n810b943", "Aig9oi3X", "n810b943");
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT * FROM Users";
  $result = $mysqli->query($query);

  echo "<table border = '1' style='width:100%;'>
          <tr>
            <th>Users In Database</th>
          </tr>";

  while($row = $result->fetch_assoc())
  {
    echo "<tr>
            <td>". $row["user_id"] ."</td>
          </tr>";
  }
  $result->free();
  echo "</table>";
?>
