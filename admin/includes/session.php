<?php

class Session {
  private $signed_in = FALSE;
  public $user_id;
          
  function __construct() {
    session_start();
    $this->check_the_login();
  }
  
  public function is_signed_in(){
    return $this->signed_in;
  }
  
  public function login($user){
    if($user){
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->signed_in = TRUE;
    }
  }
  
  public function logout(){
    $this->signed_in = FALSE;
    unset($this->user_id);
    unset($_SESSION['user_id']);
  }

  private function check_the_login(){
    if(isset($_SESSION['user_id'])){
      $this->user_id = $_SESSION['user_id'];
      $this->signed_in = TRUE;
    } else {
      unset($this->user_id);
      $this->signed_in = FALSE;
    }
  }
}

$session = new Session();