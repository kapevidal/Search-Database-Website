<?php
  $servername = "149.4.211.180";
  $username = "peki0808";
  $password = "23560808";
  $dbname = "peki0808";

  $conn = new mysqli($servername, $username, $password, $dbname);
  $conn->set_charset("utf8");

  if ($conn->connect_error) {
    echo "ERROR!";
    exit();
  }
?>
