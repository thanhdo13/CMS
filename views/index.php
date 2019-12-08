<?php
include_once('layouts/header.php');
session_start();
// var_dump($_SESSION);
?>
<script>
  function getPostList() {
    document.getElementById('postList').innerHTML = "";

    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(this.responseText);

        var list = JSON.parse(this.responseText);
        if (list != null) {
          for (var i = 0; i < list.length; i++) {
            var content = "";
            content += "<div class='col-md-6 product-men mb-5 productItem'>";
            content += "<div class='men-pro-item simpleCart_shelfItem'>";
            content += "<div class='men-thumb-item text-center'>";
            content += "<h2><a href='postDetail.php?id=" + list[i]['id'] + "' class='text-truncate'>" + list[i]['title'] + "</a></h2>";
            content += "</div>";
            content += "<div class='item-info-product text-center border-top mt-4'>";
            content += "<h4 class='pt-1'>";
            content += list[i]['category'];
            content += "</h4>";
            content += "<div class='info-product-price my-2'>";
            content += "</div>";
            content + "<div class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out'>";
            content += "</div>";
            content += "</div>";
            content += "</div>";
            content += "</div>";
            document.getElementById('postList').innerHTML += content;
          }
        }
      }
    };

    xhr.open("GET", "../controller/Post/post.php", true);
    xhr.send();
  }

  window.onload = function() {
    getPostList();
  }
</script>

<body>

  <?php include_once('layouts/nav.php') ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg">
        <div class="row" id="postList">
        </div>
      </div>
    </div>
  </div>
</body>
