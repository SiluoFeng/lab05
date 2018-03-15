<?php
$mysqli = new mysqli("mysql.eecs.ku.edu","s682f720","aX7caeyi","s682f720");
$username = $_POST["username"];
$content = $_POST["content"];
if($mysqli->connect_errno){
  prinf("Connection error %s\n",$mysqli->connect_error);
  exit();
}

if($username==''||$content =='')
{
  printf("Username or content cannot not blank!");
}
else
{
  $is_user = false;
  $query = "SELECT user_id FROM Users;";
  if($result =$mysqli->query($query))
  {
    while($row = $result->fetch_assoc())
    {
      if($row["user_id"]==$username)
      {
        $is_user = true;
      }
    }
    if($is_user == true)
    {
      $query2 = "INSERT INTO Posts(content,author_id) VALUES ('$content','$username');";
      if($mysqli->query($query2))
      {
        printf($username,"Increase successfully!");
        printf(" has increased content successfully!");
      }
    }
    else
    {
      printf("The user dose not exist!");
    }
  }
}
$mysqli->close();
?>
