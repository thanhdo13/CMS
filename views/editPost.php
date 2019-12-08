<?php
session_start();
include_once('layouts/header.php');
include_once('layouts/nav.php');
// var_dump($_SESSION);
if (isset($_SESSION['username']) == false) {
  header("Location: login.php");
}
?>
<script src="../assets/vendors/ckeditor/ckeditor.js"></script>
<!-- <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script> -->

<script>
  window.onload = function() {
    var url = new URL(window.location.href);
    var postID = url.searchParams.get('id');
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var item = JSON.parse(this.responseText);
        if (item != null) {
          document.getElementById('id').setAttribute('value', item['id']);
          document.getElementById('title').setAttribute('value', item['title']);
          document.getElementById('category').setAttribute('value', item['category']);
          document.getElementById('content').innerHTML = item['content'];
        }
      }
    }
    xhr.open("GET", "../controller/Post/post.php?id=" + postID, true);
    xhr.send();
  }
</script>

<body>
  <div class="container">
    <input name="id" type="text" id="id" style="display: none;">
    <label>Category: </label>
    <input type="text" id="category" class="form-control"><br>
    <label>Title: </label>
    <input type="text" id="title" class="form-control"><br>
    <textarea name='content' id='content' class="form-control ckeditor">
    This is my textarea to be replaced with CKEditor.
  </textarea>
    <button class="btn btn-info" onclick="editPost()">Edit</button>
  </div>
</body>

</html>
<script>
  var editor = CKEDITOR.replace('content', {
    height: 300,
    filebrowserUploadUrl: '../controller/upload/upload.php'
  });
</script>

<script>
  function editPost() {
    var id = $('#id').val();
    var content = CKEDITOR.instances.content.getData();
    var title = $('#title').val();
    var category = $('#category').val();
    if (!content || !title || !category) {
      alert("Invalid post");
    } else {
      $.post('../controller/Post/editPost.php', {
          id: id,
          title: title,
          category: category,
          content: content
        },
        function(data) {
          alert("Updated post");
          window.location = "postDetail.php?id=" + id;
        }
      ).fail(function(data) {
        alert("Could not update post ");
        console.log(data);
      })
    }
  }
</script>
