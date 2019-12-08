<?php
include_once('../../models/users.php');
session_start();
// var_dump($_SESSION);
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$result = User::login($username, $password);
// echo $result;
if ($result == 1){
  $_SESSION['username'] = $username;
  header("Location: ../../views/index.php");
} else {
  echo "Login fail";
}
