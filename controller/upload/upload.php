<?php
if (isset($_FILES['upload']['name'])) {
  $file = $_FILES['upload']['tmp_name'];
  $file_name = $_FILES['upload']['name'];
  $file_name_array = explode(".", $file_name);
  $extension = end($file_name_array);
  $new_image_name = rand() . "." . $extension;
  chmod('../../assets/images/uploads', 0777);
  $allow_extension = array("jpg", "png");
  if (in_array($extension, $allow_extension)) {
    move_uploaded_file($file, "../../assets/images/uploads/" . $new_image_name);
    $function_number = $_REQUEST["CKEditorFuncNum"];
    $url = "../assets/images/uploads/" . $new_image_name;
    $message = "";
    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
  }
}
