<?php
  class addBalanceData{
    public function add($d,$m,$io,$ci){
      session_start();
      $ui = $_SESSION['userId'];
      require_once(__Dir__."/../model/database.php");
      $bt = new BalancesTable();
      $bt -> setBalance($ui,$ci,$io,$m,$d);
    }
  }
 ?>
