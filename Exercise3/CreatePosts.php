<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "n810b943", "Aig9oi3X", "n810b943");
$userName = $_POST["userName"];
$postContent = $_POST["post"];

/* check connection */
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT user_id FROM Users WHERE user_id='".$userName."'";
  $result = $mysqli->query($query);

  if($postContent == "")
  {
    echo "There must be something in the post";
  }
  else if($result->fetch_assoc() == NULL)
  {
    echo "You can only post as a valid user (user not found)";
  }
  else
  {
    $createQuery = "INSERT INTO Posts (content, author_id) VALUES ('". $postContent ."', '". $userName ."')";
    $mysqli->query($createQuery);
    echo "Post Succesfully Created!";
  }

  $result->free();
  $mysqli->close();
?>
