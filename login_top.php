<?php
session_start();
require_once('funcs.php');

loginCheck();

if ($_SESSION["kanri_flg"] == 1){
  $user_list .= '<div class="navbar-header"><a class="navbar-brand" href="select_user.php">アカウント管理</a></div>';
}else{
  $user_list = "";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>TOPページ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="book_reg.php">書籍登録</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="select.php">書籍一覧</a></div>
    <?= $user_list ?>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
  </nav>
</header>

</body>
</html>
