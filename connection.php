<?php
  $servername = "149.4.211.180";
  $username = "peki0808";
  $password = "23560808";
  $dbname = "peki0808";

  $conn = new mysqli($servername, $username, $password, $dbname);
  $conn->set_charset("utf8");

  if ($conn->connect_error) {
    echo "ERROR: PLEASE CHECK ERROR PANEL";
    file_put_contents("error.txt","Connection failed: " . $conn->connect_error . "\r\n", FILE_APPEND | LOCK_EX);
    exit();
  }
?>
