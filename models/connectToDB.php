<?php
function connectToDB()
{
  $conn = new mysqli("localhost", "root", "", "cms");
  $conn->set_charset("utf8");
  if ($conn->connect_error) {
    die("connect error: " . mysqli_connect_error());
  }
  return $conn;
}
