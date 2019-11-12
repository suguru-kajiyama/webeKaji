<?php
  require_once(__DIR__."/../model/database.php");
  class category{
    public function set($i,$category_name){
      $db = new categoriesTable();
      $db -> setCategory($i,$category_name);
      return true;
    }
    public function getCategory($i){
      $db = new categoriesTable();
      $rec = $db -> getCategories($i);
      return $rec;
    }
  }
 ?>
