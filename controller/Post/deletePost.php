<?php
include_once('../../models/posts.php');

$id = $_REQUEST['id'];
$result = Post::deletePost($id);
header("Location: ../../views/index.php");
