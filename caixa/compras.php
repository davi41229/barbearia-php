<?php
require('../conexao.php');

$user_id = $_GET['user_id'];

$sql = 'SELECT compra, created_at FROM compras WHERE user_id = ?;';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $user_id);

$stm->execute();

$historicoCompras = $stm->fetchAll(PDO::FETCH_ASSOC);

print_r($historicoCompras);

?>