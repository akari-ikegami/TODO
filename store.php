<!-- 保存処理 -->

<?php
// dbconnect.phpを読み込むーDBに接続
include_once('./dbconnect.php');

//画面で入力された値の取得
// []内に指定するのはname属性
$title = $_POST['title'];
$contents = $_POST['contents'];

// SQL文を作成して、画面で入力された値をtasksテーブルに追加
// INSERT文の作成,追加のためのコード
$sql = "INSERT INTO tasks(title, contents, created) VALUES(:title, :contents,  now())";

//作成したSQLを実行できるように準備、dbhはDBに接続する変数
$stmt = $dbh->prepare($sql);

// 値の設定
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':contents', $contents, PDO::PARAM_STR);

// SQLを実行
$stmt->execute();

// index.phpへ移動
header('Location: ./index.php');
exit;