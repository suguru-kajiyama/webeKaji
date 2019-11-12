<?php
  require_once("../model/database.php");
  class Login{
    public function main($u,$p){
      //usestableの呼び出し
      $users = new UsersTable();
      $u = $users -> getUser($u,$p);
      //userがいるか
      //いるならセッションへ登録してtrue
      if($u){
        $this -> userIs($u['user_id']);
        return true;
      }//いない
      else{
        return false;
      }
    }
      //useridをセッションへの登録
    private function userIs($ui){
      session_start();
      $_SESSION['userId'] = $ui;
    }
  }
 ?>
