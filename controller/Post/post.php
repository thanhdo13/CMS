<?php
include_once('../../models/posts.php');
if (isset($_REQUEST['id'])) {
  $postID = $_REQUEST['id'];
  $postDetail = Post::getPostDetail($postID);
  echo json_encode($postDetail);
} else if (isset($_REQUEST['content'])) {
  $content = $_REQUEST['content'];
  $title = $_REQUEST['title'];
  $category = $_REQUEST['category'];
  $result = Post::createNewPost($title, $content, $category);
  echo $result;
} else {
  $postList = Post::getAllPost();
  echo json_encode($postList);
}
