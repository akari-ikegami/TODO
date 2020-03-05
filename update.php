<?php
// update後の画面

// DB
include_once('./dbconnect.php');
include_once('./function.php');

// 画面で入力された値の取得
$title = $_POST['title'];
$contents = $_POST['contents'];
$id = $_POST['id'];

$sql = 'UPDATE tasks SET title= :title, contents = :contents, created = now() WHERE id= :id';

$stmt= $dbh->prepare($sql);

$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':contents', $contents, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);


$stmt->execute();

header('Location: ./index.php');
exit;
