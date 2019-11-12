<?php
  $y = date("y");
  $m = date("m");
  $d = date("d");

  if(isset($_POST["yyyy"])){
    $y = $_POST["yyyy"];
  }
  if(isset($_POST["m"])){
    $m = $_POST["m"];
  }
  if(isset($_POST["d"])){
    $d = $_POST["d"];
  }
    require("../model/database.php");
    $r = new  BalancesTable();
    session_start();
    $ui = $_SESSION['userId'];
    $rec = $r -> getOneDayBalances($ui,$y,$m,$d);
    $datas = "<h5>{$y}年{$m}月{$d}日</h5>";
    foreach($rec as $a){
      $io = "支出";
      if($a['in_out'] == 1){$io = "収入";}
      $c = $a["category_name"];
      $m = $a["money"];
       $datas = $datas."<tr><td>{$io}</td><td>{$c}</td><td>{$m}</td></tr><br>";
    }echo $datas;
 ?>
