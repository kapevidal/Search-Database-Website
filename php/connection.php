<?php
  $servername = "";
  $username = "";
  $password = "";
  $dbname = "p";

  $conn = new mysqli($servername, $username, $password, $dbname);
  $conn->set_charset("utf8");

  if ($conn->connect_error) {
    echo "ERROR!";
    exit();
  }
?>
