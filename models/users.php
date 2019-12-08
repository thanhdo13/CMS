<?php
class User
{
  var $id;
  var $username;
  var $password;

  function __construct($id, $username, $password)
  {
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
  }

  static function getUserList()
  {
    $conn = new mysqli("localhost", "root", "", "cms");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
      die("connect error: " . mysqli_connect_error());
    }
    $query = 'SELECT * FROM user';
    $result = $conn->query($query);
    $userList = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($userList, new User(
          $row['id'],
          $row['username'],
          $row['password']
        ));
      }
    }
    $conn->close();
    return $userList;
  }

  static function register($username, $password)
  {
    $conn = new mysqli("localhost", "root", "", "cms");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
      die("connect error: " . mysqli_connect_error());
    }
    $userList = User::getUserList($conn);
    foreach ($userList as $key => $value) {
      if (strcmp($value->username, $username) == 0) {
        return 0;
      }
    }
    $query = "INSERT INTO `user`(`username`, `password`) VALUES ('$username', '$password')";
    $result = $conn->query($query);
    $conn->close();
    return 1;
  }

  static function login($username, $password)
  {
    $conn = new mysqli("localhost", "root", "", "cms");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
      die("connect error: " . mysqli_connect_error());
    }
    $userList = User::getUserList($conn);
    for ($i = 0; $i < sizeof($userList); $i++)
      if (strcmp($username, $userList[$i]->username) == 0 && strcmp($password, $userList[$i]->password) == 0) {
        return 1;
      }
    return 0;
  }
}
