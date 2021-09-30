<?php
require('../conexao.php');

$arquivo = $_FILES['photo'];

$nomeArquivo = $_FILES['photo']['name'];
$caminhoAtual = $_FILES['photo']['tmp_name'];
$caminhoSalvar = 'images/'.$nomeArquivo;

move_uploaded_file($caminhoAtual, $caminhoSalvar);

$name = $_POST['name'];
$phone = $_POST['phone'];
$instagram = $_POST['instagram'];
$birth = $_POST['birth'];
$gender = $_POST['gender'];
$terms = $_POST['terms'];

$sql = 'INSERT INTO usuarios (photo, name, phone, instagram, birth, gender, terms) VALUES (?, ?, ?, ?, ?, ?, ?);';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $nomeArquivo);
$stm->bindValue(2, $name);
$stm->bindValue(3, $phone);
$stm->bindValue(4, $instagram);
$stm->bindValue(5, $birth);
$stm->bindValue(6, $gender);
$stm->bindValue(7, $terms);

$stm->execute();

header('location: ../usuarios.php');

?>