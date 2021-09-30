<?php
require('conexao.php');

$arquivo = $_FILES['arquivo'];

$nomeArquivo = $_FILES['arquivo']['name'];
$caminhoAtual = $_FILES['arquivo']['tmp_name'];
$caminhoSalvar = 'images/'.$nomeArquivo;

move_uploaded_file($caminhoAtual, $caminhoSalvar);

$name = $_POST['name'];
$phone = $_POST['phone'];
$instagram = $_POST['instagram'];
$birth = $_POST['birth'];
$gender = $_POST['gender'];

$sql = 'INSERT INTO usuarios (photo, name, phone, instagram, birth, gender) VALUES (?, ?, ?, ?, ?, ?);';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $nomeArquivo);
$stm->bindValue(2, $name);
$stm->bindValue(3, $phone);
$stm->bindValue(4, $instagram);
$stm->bindValue(5, $birth);
$stm->bindValue(6, $gender);

$stm->execute();

header('location: usuarios.php');

?>