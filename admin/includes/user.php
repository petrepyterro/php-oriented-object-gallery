<?php

class User extends Db_object{
  
  protected static $db_table = "users";
  protected static $db_table_fields = array("username", "user_password", "user_firstname", "user_lastname", "user_image");
  public $id;
  public $user_password;
  public $username;
  public $user_firstname;
  public $user_lastname;
  
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
  
  public function image_path_and_placeholder(){
    return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
  }

  public function delete_user(){
    if($this->delete()){
      if(!empty($this->user_image)){
        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
        return unlink($target_path) ? TRUE : FALSE;
      }
    } else {
      return FALSE;
    }
  }

  public static function verify_user($username, $password){
    global $database;
    
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);
    
    $sql = "SELECT * FROM " . self::$db_table . " WHERE username='$username' AND user_password='$password' LIMIT 1";
    $the_result_array = self::find_by_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false; 
  }

  
  //This is passing $_FILES['uploaded_file'] as an argument
  public function set_file($file) {
    if(empty($file) || !$file || !is_array($file)){
      $this->errors[] = "There was no file uploaded here";
      return false;
    } else if($file['error'] != 0){
      $this->errors[] = $this->upload_errors_array[$file['error']];
      return FALSE;
    } else {
      $this->user_image = basename($file['name']);
      $this->tmp_path = $file['tmp_name'];
    }
  }
  
  public function upload_photo(){
    if(!empty($this->errors)){
      return FALSE;
    }
    if(empty($this->user_image) || empty($this->tmp_path)){
      $this->errors[] = "the file was not available";
      return FALSE;
    }

    $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

    if(file_exists($target_path)){
      $this->errors[] = "The file {$this->user_image} already exists";
      return FALSE;
    }

    if(move_uploaded_file($this->tmp_path, $target_path)){
      unset($this->tmp_path);
      return TRUE; 
    } else {
      $this->errors[] = "The file directory probably does not have permission";
      return FALSE;
    }
  }
 }



