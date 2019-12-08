<?php
session_start();
include_once('./layouts/header.php');
include_once('layouts/nav.php')
?>

<script>
  function getPostDetail() {
    var url = new URL(window.location.href);
    var postID = url.searchParams.get('id');
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {

        var item = JSON.parse(this.responseText);
        if (item != null) {
          document.getElementById('title').innerHTML = `<h2 class='mt-5'>${item['title']}</h2>`;
          document.getElementById('content').innerHTML = item['content'];
        }
      }
    }
    xhr.open("GET", "../controller/Post/post.php?id=" + postID, true);
    xhr.send();
  }

  function checkLogin() {
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var result = JSON.parse(this.responseText);
        var url = new URL(window.location.href);
        var postID = url.searchParams.get('id');
        if (result) {
          var temp = document.getElementById('nav-list').innerHTML;
          temp = `<li class='nav-item active'><a class='nav-link' href='editPost.php?id=${postID}'>Sửa bài viết </a> </li>
                  <li class='nav-item active'><a class='nav-link' href='../controller/Post/deletePost.php?id=${postID}'>Xóa bài viết </a> </li>` +
            temp;
          document.getElementById('nav-list').innerHTML = temp;
        }
      }
    }
    xhr.open("GET", "../controller/User/checkLogin.php", true);
    xhr.send();
  }
</script>

<script>
  window.onload = function() {
    getPostDetail();
    checkLogin();
  }
</script>

<body>
  <div class="container">
    <div class="row" id="title">
    </div>
    <div class="row" id="content"></div>
  </div>

</body>

</html>
