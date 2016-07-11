<?php

class User extends Db_object{
  
  protected static $db_table = "users";
  protected static $db_table_fields = array("username", "user_password", "user_firstname", "user_lastname");
  public $id;
  public $user_password;
  public $username;
  public $user_firstname;
  public $user_lastname;
  
  
  
  public static function verify_user($username, $password){
    global $database;
    
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);
    
    $sql = "SELECT * FROM " . self::$db_table . " WHERE username='$username' AND user_password='$password' LIMIT 1";
    $the_result_array = self::find_by_query($sql);
    return !empty($the_result_array) ? array_shift($the_result_array) : false; 
  }

  public function save(){
    return isset($this->id) ? $this->update() : $this->create();
  }
  
  
  
}



