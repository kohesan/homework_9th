<?php
session_start();
require_once('funcs.php');

loginCheck();

//1.  DB接続します
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
  sql_error($stmt);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  // .=で上書きではなく，足していく
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';

    // 詳細ページリンク
    $view .= '<a href="bm_update_view.php?id='.$result["id"].'">';
    $view .= $result["indate"] . "：" . $result["name"];
    $view .= '</a>';
    if ($_SESSION["kanri_flg"] == 1){
    // 削除ページリンク
    $view .= '<a href="bm_delete.php?id='.$result["id"].'">';
    $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';    
    $view .= '</a>';  
    }
    $view .= '</p>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BOOK登録</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="book_reg.php">書籍登録</a>
      <a class="navbar-brand" href="login_top.php">ログインTOP画面</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
