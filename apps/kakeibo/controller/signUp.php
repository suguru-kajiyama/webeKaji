<?php
  require_once("../model/database.php");
  class signUp{
    //signupの時の処理
    public function main($n,$p){
      //データベースにユーザ名が重複してないか確認
      //してない
      if(!($this -> userExist($n)) ){
        //登録してtrueを返す
        $this -> UserSignUp($n,$p);
        return true;
      }//してた
      else{
        return false;
      }
    }private function userSignUp($n,$p){
      $db = new UsersTable();
      $db -> setUser($n,$p);
    }private function userExist($n){
      $db = new UsersTable();
      return $db -> getUser($n,"*");
    }
  }
 ?>
