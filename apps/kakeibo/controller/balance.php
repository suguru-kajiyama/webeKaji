<?php
  require_once("../model/database.php");

  $db = new BalancesTable();
  session_start();
  $u = $_SESSION["userId"];

  if(isset($_POST["kind"])){
    if($_POST["kind"]=="month"){
      $y = $_POST["yyyy"];
      $m = $_POST["m"];
      $rec = $db -> getOneMonthBalances($u,$y,$m);
      $dates = "";
      foreach($rec as $r){
        $dates = $dates."{$r['balance_date']} {$r['in_out']} {$r['money']}".",";
      }echo $dates;
    }
  }
 ?>
