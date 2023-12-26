<?php
$con = mysqli_connect("localhost","root","","sc");
echo "server is connected";
if (!$con)
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>