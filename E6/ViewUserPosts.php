<?php
  echo "<html><body><table>";
  $select = $_POST["select"];
  $mysqli = new mysqli("mysql.eecs.ku.edu","s682f720","aX7caeyi","s682f720");
  if($mysqli->connect_errno)
  {
    printf("Connection Failed! %s\n",$mysqli->connect_error);
    exit();
  }
  $query = "SELECT content FROM Posts WHERE author_id = '$select'";
  if($result=$mysqli->query($query))
  {
    while($row=$result->fetch_assoc())
    {
        echo "<tr><td>".$row["content"]."</td></tr>";
    }
  }
  else
  {
    echo "<tr><td>Sorry, nothing in content</td></tr>";
  }
  $mysqli->close();
  echo "</table></body></html>";
?>
