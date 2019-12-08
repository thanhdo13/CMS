<?php
include_once('../../models/posts.php');

$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$category = $_REQUEST['category'];
$content = $_REQUEST['content'];

$result = Post::editPost($id, $title, $category, $content);
echo $result;
