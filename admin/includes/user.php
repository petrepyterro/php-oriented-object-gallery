<?php

class User extends Db_object{
  
  protected static $db_table = "users";
  protected static $db_table_fields = array("username", "user_password", "user_firstname", "user_lastname", "user_image");
  public $id;
  public $user_password;
  public $username;
  public $user_firstname;
  public $user_lastname;
  public $user_image;
  public $upload_directory = "images" . DS . "users";
  public $image_placeholder = "http://placehold.it/400x400&text=image";
  
  public function image_path_and_placeholder(){
    return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
  }

  public static function verify_user($username, $password){
    global $database;
    
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);
    
    $sql = "SELECT * FROM " . self::$db_table . " WHERE username='$username' AND user_password='$password' LIMIT 1";
    $the_result_array = self::find_by_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false; 
  }

  
  
  
  
}



