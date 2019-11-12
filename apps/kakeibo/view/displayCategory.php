<?php
  require_once(__DIR__."../../controller/category.php");
  class displayCategory{
    public function displayRadio($i){
      $t = new category();
      $recs = $t -> getCategory($i);
      foreach($recs as $r){
        echo "<input type='radio' name='category_id' value='{$r['category_id']}'>";
        echo "{$r['category_name']}<br>";
      }
    }
  }
 ?>
