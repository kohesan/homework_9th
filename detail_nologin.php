<?php

$id = $_GET['id'];
require_once('funcs.php');
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();


//３．データ表示
if ($status == false) {
    sql_error($status);
} else {
    $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select_nologin.php">BOOK一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
  <div class="jumbotron">
   <fieldset>
    <legend>BOOK詳細</legend>
     <label>名前：<?= $row['name'] ?></label><br>
     <label>コメント：<?= $row['comment'] ?></label><br>
     <label>URL：</label><a href="<?= $row['url'] ?>">リンクはこちら</a><br>
    </fieldset>
  </div>
<!-- Main[End] -->


</body>
</html>
