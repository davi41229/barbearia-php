<?php
require('conexao.php');

$sql = $pdo->query('SELECT * FROM usuarios');

$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);

print_r($usuarios);

?>