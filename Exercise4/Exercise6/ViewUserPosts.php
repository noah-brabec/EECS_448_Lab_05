<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "n810b943", "Aig9oi3X", "n810b943");
  $user = $_POST["dropDown"];


  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT content FROM Posts WHERE author_id='".$user."'";
  $result = $mysqli->query($query);


  echo "<table border = '1' style='width:100%;'>
          <tr>
            <th>". $user ."'s Posts</th>
          </tr>";

  while($row = $result->fetch_assoc())
  {
    echo "<tr>
            <td>". $row["content"] ."</td>
          </tr>";
  }
  $result->free();
  echo "</table>";


?>
