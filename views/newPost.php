<?php
session_start();
include_once('layouts/header.php');
include_once('layouts/nav.php');
//var_dump($_SESSION);
if (isset($_SESSION['username']) == false) {
  header("Location: login.php");
}
?>
<script src="../assets/vendors/ckeditor/ckeditor.js"></script>
<!-- <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script> -->

<body>
  <div class="container">
    <label>Category: </label>
    <input type="text" id="category" class="form-control"><br>
    <label>Title: </label>
    <input type="text" id="title" class="form-control"><br>
    <textarea name='content' id='content' class="form-control ckeditor">
  </textarea>
    <button class="btn btn-info" onclick="createPost()">Create</button>
  </div>
</body>

</html>
<script>
  var editor = CKEDITOR.replace('content', {
    height: 300,
    filebrowserUploadUrl: '../controller/upload/upload.php'});
</script>

<script>
  function createPost() {
    var content = CKEDITOR.instances.content.getData();
    var title = $('#title').val();
    var category = $('#category').val();
    if (!content || !title || !category) {
      alert("Invalid post");
    } else {
      $.post('../controller/Post/post.php', {
          title: $('#title').val(),
          category: $('#category').val(),
          content: content
        },
        function(data) {
          alert("Created new post");
          console.log(data);
          window.location = "index.php";
        }
      ).fail(function() {
        alert("Could not create post");
      })
    }
  }
</script>
