<?php
class Cars {
  private $door_count = 4;

          
  function get_values(){
    echo $this->door_count;
  }
  
  function set_values(){
    echo $this->door_count = 10;
  }
  
}

$bmw = new Cars();

echo $bmw->set_values();
echo $bmw->get_values();