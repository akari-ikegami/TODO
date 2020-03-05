<?php

include_once('./dbconnect.php');
include_once('./function.php');

$id = $_POST['id'];

$sql = 'DELETE FROM tasks WHERE id = :id';

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute([$id]);

header('Location: ./index.php');
exit;

