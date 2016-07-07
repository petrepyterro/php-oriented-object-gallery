<?php 
  echo "<pre>";
  print_r($_FILES['file_upload']);
  echo "</pre>";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file_upload"/><br>
      <input type="submit" name="submit"/>
    </form>
  </body>
</html>
