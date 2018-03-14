<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "s682f720", "aX7caeyi", "s682f720");
$username = $_POST["username"];
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('$username')";

if($username == ""){
  echo "Wrong!Username cannot blank <br>";
}else{
  if($mysqli->query($query)){
    echo "Submit successfully";
  }else{
    echo "Wrong!Users already in database!";
  }
}
/* close connection */
$mysqli->close();
?>
