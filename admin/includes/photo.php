<?php

class Photo extends Db_object{
  protected static $db_table = "photos";
  protected static $db_table_fields = array("photo_title", "photo_description", "photo_filename", "photo_type", "photo_size");
  public $id;
  public $photo_title;
  public $photo_description;
  public $photo_filename;
  public $photo_type;
  public $photo_size;
  
  public $tmp_path;
  public $upload_directory = "images";
  public $errors = array();
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
  
  //This is passing $_FILES['uploaded_file'] as an argument
  public function set_file($file) {
    if(empty($file) || !$file || !is_array($file)){
      $this->errors[] = "There was no file uploaded here";
      return false;
    } else if($file['error'] != 0){
      $this->errors[] = $this->upload_errors_array[$file['error']];
      return FALSE;
    } else {
      $this->photo_filename = basename($file['name']);
      $this->tmp_path = $file['tmp_name'];
      $this->photo_type = $file['type'];
      $this->photo_size = $file['size'];
    }
  }
  
}

