<?php

// ２.PHPからMySQLへ接続
// dbconnect.phpを読み込むーDBに接続
include_once('./dbconnect.php');

// 新しいレコードを追加するための処理
// 処理の流れ
// 最終のゴール：新しいタスクが追加されてTOPni戻る

// １.画面で入力された値の取得
// ２.PHPからMySQLへ接続
// ３.SQL文を作成して、画面で入力された値をtaskテーブルに追加
// ４.index.phpに画面遷移する


// １.画面で入力された値の取得
// []内に指定するのはname属性
$title = $_POST['title'];
$contents = $_POST['contents'];


// ３.SQL文を作成して、画面で入力された値をtasksテーブルに追加
// INSERT文の作成
$sql = "INSERT INTO tasks(title, contents, created) VALUES(:title, :contents, :created, now())";


//作成したSQLを実行できるように準備
$stmt = $pdo->prepare($sql);

// 値の設定
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':contents', $contents, PDO::PARAM_STR);

// SQLを実行
$stmt->execute();