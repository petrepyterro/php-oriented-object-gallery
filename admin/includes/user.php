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
}

