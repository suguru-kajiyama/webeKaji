<?php
  //バリデート処理
  class Validate{
    //htmlタグにならないか
    public static function htmlcheck($t){
      return　true;
    }//sqlチェック
    public static function sqlcheck($t){
      return true;
    }//数値担っているか
    public static function numbercheck($t){
      return true;
    }//date yyyymmdd系になっているか
    public static function datecheck($t){
      return true;
    }
  }
 ?>
