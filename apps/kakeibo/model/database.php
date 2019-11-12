<?php
  class Table{
    protected $pdo;
    public function __construct(){
      $this->dsn = "mysql:dbname=kakeibo;host=localhost;charset=utf8";
      $this->username = "root";
      $this->password = "root";
      $this->pdo = new PDO($this->dsn, $this->username, $this->password);
      $this->pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
  }
  //ユーザーテーブル
  class UsersTable extends Table{
    //名前とパスワードの一致するユーザーを返す
    public function getUser($u,$p){
      $sql = "SELECT * FROM USERS WHERE(user_name='{$u}' AND password='{$p}')";
      $stmt = $this -> pdo -> prepare($sql);
      $stmt -> execute();
      $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
      return $rec;
    }//新規登録用
    public function setUser($u,$p){
      $sql = "INSERT INTO USERS(user_name,password) VALUES ('{$u}','{$p}')";
      $stmt = $this -> pdo -> prepare($sql);
      $stmt -> execute();
    }
  }
  //収支テーブル
  class BalancesTable extends Table{
    //登録
    public function setBalance($Uid,$Cid,$io,$m,$d){
      $sql = "INSERT INTO balance(user_id,category_id,in_out,money,balance_date)
              VALUES('{$Uid}','{$Cid}','{$io}','{$m}','{$d}')";
      $stmt = $this -> pdo -> prepare($sql);
      $stmt -> execute();
    }
    //登録の削除
    public function deleteBalance(){}
    //変更
    public function changeBalance(){}
    //月の収支を返す
    public function getOneMonthBalances($Uid,$y,$m){
      //$m<10 0埋め
      if($m<10){
        $m = "0".$m;
      }
      $sql = "SELECT * FROM balance WHERE (user_id = {$Uid} )AND (balance_date LIKE '{$y}-{$m}%')";
      $stmt = $this -> pdo -> prepare($sql);
      $stmt -> execute();
      return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    //日の収支を返す
    public function getOneDayBalances($Uid,$y,$m,$d){
      if($m<10){
        $m = "0".$m;
      }if($d<10){
        $d = "0".$d;
      }
      $w = " WHERE (balance.user_id ={$Uid} AND (balance.balance_date LIKE '{$y}-${m}-{$d}'))";
      $sql =  "select * from balance inner join category on balance.category_id = category.category_id".$w;
      $stmt = $this -> pdo -> prepare($sql);
      $stmt -> execute();
      return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
  }
  //カテゴリーテーブル
  class CategoriesTable extends Table{
    //登録
    public function setCategory($i,$n){
      $sql = "INSERT INTO category(user_id,category_name)
              VALUES('{$i}','{$n}')";
      $stmt = $this -> pdo -> prepare($sql);
      $stmt -> execute();
      return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    //削除
    public function deleteCategory(){}
    //変更
    public function changeCategory(){}
    //カテゴリー名を返す
    public function getCategories($i){
      $sql = "SELECT * FROM category WHERE(user_id='{$i}')";
      $stmt = $this -> pdo -> prepare($sql);
      $stmt -> execute();
      $rec = $stmt -> fetchAll(PDO::FETCH_ASSOC);
      return $rec;
    }
  }
?>
