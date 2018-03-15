<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "n810b943", "Aig9oi3X", "n810b943");
$newUser = $_POST["userName"];

/* check connection */
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT user_id FROM Users WHERE user_id='".$newUser."'";
  $result = $mysqli->query($query);

  if($newUser == "")
  {
    echo "Blank user name is not allowed";
  }
  else if($result->fetch_assoc() == NULL)
  {
    $createQuery = "INSERT INTO Users (user_id) VALUES ('". $newUser ."')";
    $mysqli->query($createQuery);
    echo "User Created!";
  }
  else
  {
    echo "A user already exists with that name<br>";
    echo "(click the back button)";
  }

  $result->free();
  $mysqli->close();
?>

  $result->free();
  $mysqli->close();
?>
