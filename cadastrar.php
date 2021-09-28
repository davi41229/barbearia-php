<?php
require('conexao.php');

$name = $_POST['name'];
$phone = $_POST['phone'];
$instagram = $_POST['instagram'];
$birth = $_POST['birth'];

$sql = 'INSERT INTO usuarios (name, phone, instagram, birth) VALUES (?, ?, ?, ?);';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $name);
$stm->bindValue(2, $phone);
$stm->bindValue(3, $instagram);
$stm->bindValue(4, $birth);

$stm->execute();

header('location: usuarios.php');
?>