<?php

class Comment extends Db_object{
  
  protected static $db_table = "comments";
  protected static $db_table_fields = array("id", "photo_id", "author", "body");
  public $id;
  public $photo_id;
  public $author;
  public $body;
  
  public $tmp_path;
  public $user_image;
  public $upload_directory = "images" . DS . "users";
  public $image_placeholder = "http://placehold.it/400x400&text=image";
  public $errors;
  public $upload_errors_array = array(
    UPLOAD_ERR_OK             => "There is no error",
    UPLOAD_ERR_INI_SIZE       => "The uploaded file exceeds the upload_max_filesize directive",
    UPLOAD_ERR_FORM_SIZE      => "The uploaded file exceeds the MAX_FILE_SIZE directive",
    UPLOAD_ERR_PARTIAL        => "The uploaded file was only partially uploaded",
    UPLOAD_ERR_NO_FILE        => "No file was uploaded",
    UPLOAD_ERR_NO_TMP_DIR     => "Missing a temporary folder",
    UPLOAD_ERR_CANT_WRITE     => "Failed to write file to disk",
    UPLOAD_ERR_EXTENSION      => "A PHP extension stopped the file upload"   
  );
  
  
  public static function create_comment($photo_id, $author="John", $body=""){
    if(!empty($photo_id) && !empty($author) && !empty($body)){
      $comment = new Comment();
      $comment->photo_id  = (int)$photo_id;
      $comment->author    = $author;
      $comment->body      = $body;
      
      return $comment;
    } else {
      return FALSE;
    }
  }
  
  public static function find_the_comments($photo_id=0){
    global $database;
    
    $sql = "SELECT * FROM " . self::$db_table . " WHERE photo_id=";
    $sql .= $database->escape_string($photo_id);
    $sql .= " ORDER BY photo_id ASC";
    
    return self::find_by_query($sql);
  }
 }



