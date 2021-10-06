<?php
require('../conexao.php');

$user = $_POST['user'];
$password = sha1($_POST['password']);

echo $user;
echo $password;

$sql = 'INSERT INTO conta (user, password) VALUES (?, ?);';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $user);
$stm->bindValue(2, $password);

$stm->execute();

header('location: ../login');

?>