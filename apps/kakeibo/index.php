<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>ログイン</h1>
    <div class="">
      <form class="" action="controller/root.php" method="post">
        <p>ユーザー名<input type="text" name="user_name" value=""></p>
        <p>パスワード<input type="text" name="password" value=""></p>
        <input type="submit" name="login" value="ログイン">
        <input type="submit" name="signUpPage" value="新規作成">
      </form>
      <?php
        $code = "";
        if( isset($_GET['code'] )){
          $code = $_GET['code'];
        }
        switch($code){
          case 1:echo "入力値が不正です";break;
          case 2:echo "ユーザー名もしくはパスワードが違います ";break;
          case 3:echo "登録に成功しました";break;
          default:;
        }
       ?>
    </div>
  </body>
</html>
