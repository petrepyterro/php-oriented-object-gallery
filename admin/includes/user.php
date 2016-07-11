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

    public static function instantiation($the_record){
    $the_object = new self();
    
    //$the_object->id = $found_user['user_id'];
    //$the_object->username = $found_user['username'];
    //$the_object->password = $found_user['user_password'];
    //$the_object->firstname = $found_user['user_firstname'];
    //$the_object->lastname = $found_user['user_lastname'];
    foreach($the_record as $the_attribute => $value){
      if($the_object->has_the_attribute($the_attribute)){
        $the_object->$the_attribute = $value;
      }
    }
    return $the_object;
  }
  
  private function has_the_attribute($the_attribute){
    $object_properties = get_object_vars($this);
    return array_key_exists($the_attribute, $object_properties);
  }
  
  
}



