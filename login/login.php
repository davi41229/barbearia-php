<?php
require('../conexao.php');

$user = $_POST['user'];
$senha = sha1($_POST['password']);

$sql = 'SELECT * FROM conta WHERE user = ? AND password = ?;';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $user);
$stm->bindValue(2, $senha);

$stm->execute();

$usuario = $stm->fetchAll(PDO::FETCH_ASSOC);

if (count($usuario) <= 0) {
    echo "Usuário ou senha estão incorretos ";
    echo "<a href='../login'>Tente novamente.</a>";
} else {
    print_r($usuario);
}


?>