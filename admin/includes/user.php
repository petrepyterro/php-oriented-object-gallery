<?php

class User {
  public $id;
  public $password;
  public $username;
  public $firstname;
  public $lastname;
  
  public static function find_all_users(){
    self::find_this_query("SELECT * FROM users");
  }
  
  public static function find_user_by_id($id){
    
    $result_set = self::find_this_query("SELECT * FROM users WHERE user_id=$id LIMIT 1");
    $found_user = mysqli_fetch_array($result_set);
    return $found_user;
  }
  
  public static function find_this_query($sql){
    global $database;
    
    $result_set = $database->query($sql);
    return $result_set;
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
        $the_object->the_attribute = $value;
      }
    }
    return $the_object;
  }
  
  private function has_the_attribute($the_attribute){
    $object_properties = get_object_vars($this);
    return array_key_exists($the_attribute, $object_properties);
  }
}



