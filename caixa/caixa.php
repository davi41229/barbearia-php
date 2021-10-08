<?php
require('../conexao.php');

$user_id = $_POST['user_id'];
$compra = $_POST['compra'];

$sql = 'INSERT INTO compras (user_id, compra) VALUES (?, ?);';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $user_id);
$stm->bindValue(2, $compra);

$stm->execute();

header('location: compras.php?user_id='.$user_id);

?>