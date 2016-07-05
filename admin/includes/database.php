<?php
require_once 'new_config.php';

class Database {
  public $connection;
  
  public function __construct() {
    $this->open_db_connection();
  }

  public function open_db_connection() {
    $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if(mysqli_connect_error()){
      die("Database connection failed badly " . mysqli_error());
    }
  }
  
  public function query($sql){
    $result = mysqli_query($this->connection, $sql);
    $this->confirmQuery($result);
    return $result;
  }
  
  private function confirmQuery($result){
    if (!$result){
      die("Query failed " . mysqli_error($this->connection));
    }
  }
  
  public function escape_string($string){
    $escaped_string = mysqli_real_escape_string($this->connection, $string);
    return $escaped_string;
  }
  
}

$database = new Database();
