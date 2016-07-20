<?php

require_once 'init.php';

$user = new User();

if(isset($_POST['user_image'])){
  $user->ajax_save_user_image($_POST['user_image'], $_POST['user_id']);
}

