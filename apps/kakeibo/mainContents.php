<?php
  $y = date("Y");
  $m = date("m");
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="public/css/master.css"rel="stylesheet" type="text/css" media="all"/>
    <style media="screen">
    .header{
      width: 100%;
    }
    #cal_cell{
 display: inline-flex;
}.cell{
height: 100px;
width:80px;
border-bottom: solid:
}#day_0 h4{
color: red;
}#day_6 h4{
color:blue;
}h5{
margin:0;
text-align:center;
}
p{
line-height:0px;
}.mon{

}.dummy{
  background-color: gray;
}.container{
  display: inline-flex;;
}.day{
  width: 40%;
}
    </style>
    <script src="public/js/jquery.3.3.31.js"></script>
  <script type="text/javascript"src="public/js/balance.js"></script>
  <script type="text/javascript"src="public/js/js.js"></script>
  </head>

  <body>
    <!-- ヘッダー-->
    <div class="header">
      <h1>収支表</h1>
      <form class="" action="controller/root.php" method="post">
        <input type="submit" name="logout" value="ログアウト">
        <input type="submit" name="mypage" value="マイページ">
      </form>
    </div>
    <!-- メインコンテンツ-->
    <div class="container">
      <!--月ごとの収支 --->
      <div class="month">
        <div id="cal">
          <h3 id="date">js</h3>
          <div id="cal_cell"></div>

          <div id="prev">
            <p><< </p>
          </div>
          <div id="next">
            <p> >> </p>
          </div>
        </div>
      </div>
      <!-- 日毎の収支-->
      <div class="day">

      </div><br>
      <!--登録フォーム-->
      <div class="input_form">
        <form class=""action="controller/root.php" method="post">
          <?php
            require(__Dir__."/view/displayCategory.php");

            $c = new displayCategory();
            $c -> displayRadio($_SESSION["userId"]);
          ?>

        <input type="date" name="date"><br>
        <input type="text" name="money" value="0">円<br>
        <input type="radio" name ='inout' value="-1"checked='checked'>支出<br>
        <input type="radio" name ='inout'value="1">収入<br>
        <input type="submit"name="inputBalance"value="登録する"><br>
        </form>
      </div>
    </div>
    <!--フッター--->
    <div class="footer">

    </div>
    </body>
</html>
