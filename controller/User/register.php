<?php
include_once('../../models/users.php');
include_once('../../models/users.php');
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$confirmPassword = $_REQUEST['confirmPassword'];
$userList = User::getUserList();
foreach ($userList as $key => $value) {
  echo $value->username;
  echo $value->password;
}

if (strcmp($password, $confirmPassword)) {
  echo "password error " . $password . $confirmPassword;
} else {
  $result = User::register($username, $password);
  // echo $result;
  if ($result == 1)
    header("Location: ../../views/login.php");
  else echo "username error " . $username;
}
