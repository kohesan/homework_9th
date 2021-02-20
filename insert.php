<?php

session_start();
$name = $_POST['name'];
$url = $_POST['url'];
$comment = $_POST['comment'];


require_once('funcs.php');

loginCheck();

//1.  DB接続します
$pdo = db_conn();

//３．データ登録SQL作成

// 1. SQL文を用意 ":name"等は仮の変数
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, url, comment, indate)VALUES(NULL, :name, :url, :comment, sysdate())");

//  2. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
  redirect('index.php');
}
?>
