<?php


header("Content-Type:application/json");

include 'db_connect.php';
$pdo = pdo_connect_mysql();

$stmt = $pdo->prepare('SELECT * FROM students');
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($students);

?>
