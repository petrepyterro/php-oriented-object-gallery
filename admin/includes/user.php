<?php

class User {
  public $user_id;
  public $user_password;
  public $username;
  public $user_firstname;
  public $user_lastname;
  
  public static function find_all_users(){
    return self::find_this_query("SELECT * FROM users");
  }
  
  public static function find_user_by_id($id){
    
    $the_result_array = self::find_this_query("SELECT * FROM users WHERE user_id=$id LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
    /*if (!empty($the_result_array)){
      $first_element = array_shift($the_result_array);
      return $first_element;
    } else {
      return false;
    }
     * 
     */
  }
  
  public static function find_this_query($sql){
    global $database;
    $result_set = $database->query($sql);
    $the_object_array = array();
    
    while($row = mysqli_fetch_array($result_set)){
      $the_object_array[] = self::instantiation($row);
    }
    
    return $the_object_array;
  }
  
  public static function verify_user($username, $password){
    global $database;
    
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);
    
    $sql = "SELECT * FROM users WHERE username='$username' AND user_password='$password' LIMIT 1";
    $the_result_array = self::find_this_query($sql);
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
  
  public function create(){
    global $database;
    
    $sql = "INSERT INTO users (username, user_password, user_firstname, user_lastname) ";
    $sql .= "VALUES ('";
    $sql .= $database->escape_string($this->username) . "','";
    $sql .= $database->escape_string($this->user_password) . "','";
    $sql .= $database->escape_string($this->user_firstname) . "','";
    $sql .= $database->escape_string($this->user_lastname) . "')";
    
    if($database->query($sql)){
      $this->user_id = $database-> the_insert_id();
      return TRUE;
    } else {
      return FALSE;
    };
  }
}



