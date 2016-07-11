<?php

class Photo extends Db_object{
  protected static $db_table = "photos";
  protected static $db_table_fields = array("photo_title", "photo_description", "photo_filename", "photo_type", "photo_size");
  public $id;
  public $photo_title;
  public $photo_description;
  public $photo_filename;
  public $photo_type;
  public $photo_size;
}

