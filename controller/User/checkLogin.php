<?php
session_start();
$result = false;
if (isset($_SESSION['username'])) {
  $result = true;
  echo json_encode($result);
} else echo json_encode($result);
