<?php
class Post
{
  var $id;
  var $title;
  var $content;
  var $category;

  function __construct($id, $title, $content, $category)
  {
    $this->id = $id;
    $this->title = $title;
    $this->category = $category;
    $this->content = $content;
  }

  static function getAllPost()
  {
    $conn = new mysqli("localhost", "root", "", "cms");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
      die("connect error: " . mysqli_connect_error());
    }
    $query = "SELECT * FROM post";
    $post = $conn->query($query);
    $rs = array();
    if ($post->num_rows > 0) {
      while ($row = $post->fetch_assoc()) {
        array_push($rs, new Post(
          $row['id'],
          $row['title'],
          $row['category'],
          $row['content']
        ));
      }
    }
    $conn->close();
    return $rs;
  }

  static function editPost($id, $title, $category, $content)
  {
    $conn = new mysqli("localhost", "root", "", "cms");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
      die("connect error: " . mysqli_connect_error());
    }
    $query = "UPDATE `post` SET `category`= '$category',`title`= '$title',`content`='$content' WHERE `id` = '$id'";
    $result = $conn->query($query);
    $conn->close();
    return $result;
  }

  static function deletePost($id)
  {
    $conn = new mysqli("localhost", "root", "", "cms");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
      die("connect error: " . mysqli_connect_error());
    }

    $query = "DELETE FROM post WHERE id = '$id'";
    $result = $conn->query($query);
    $conn->close();
    return $result;
  }

  static function getPostDetail($postID)
  {
    $conn = new mysqli("localhost", "root", "", "cms");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
      die("connect error: " . mysqli_connect_error());
    }
    $query = "SELECT * FROM post WHERE ID = " . $postID;
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $temp = new Post(
          $row['id'],
          $row['title'],
          $row['content'],
          $row['category']
        );
        $conn->close();
        return $temp;
      }
    }
    $conn->close();
    return null;
  }

  static function createNewPost($title, $content, $category)
  {
    $conn = new mysqli("localhost", "root", "", "cms");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
      die("connect error: " . mysqli_connect_error());
    }
    $query = "INSERT INTO post(category, title, content) values ('$category', '$title', '$content')";
    $result = $conn->query($query);
    $conn->close();
    return $result;
  }
}
