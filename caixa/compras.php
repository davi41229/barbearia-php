<?php
require('../conexao.php');


$user_id = $_POST['user_id'];
$servicos = $_POST['servicos'];
$pagamento = $_POST['pagamento'];

$string = implode(",", $servicos); 

#echo "id: ".$user_id."<br>";
#echo "implodido ".$string."<br>";

$explode = explode(",", $string);

#echo "<br><br> explodido";
#print_r($explode);

#foreach ($explode as $um) {
#    echo "<br><br>";
#    echo "item-> ".$um."<br><br>";
#}

#print_r($explode);

$soValores = [];

for ($i=0; $i < count($explode); $i++) { 
#    echo "<br>item ".$i." ---> ".$explode[$i]."<br>";

    if ($i % 2 == 1) {
#        echo $i." é impar<br>";
        
        array_push($soValores, $explode[$i]);
    }
}

#print_r($soValores);

function sum($carry, $item)
{
    $carry += $item;
    return $carry;
}

$valorTotal = array_reduce($soValores, "sum");

#echo "<br>***".$valorTotal."***<br>";

#echo "<br>id: ".$user_id."<br>";
#echo "<br>implodido ".$string."<br>";
#echo "<br>compra: ".$valorTotal."<br>";

if ($valorTotal > $pagamento) {

    echo "<script language='Javascript'>window.location.href='caixa2.php'; alert('Pagamento Insuficiente!');</script>";

    exit();
}

$sql = 'INSERT INTO compras (user_id, servicos, compra) VALUES (?, ?, ?);';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $user_id);
$stm->bindValue(2, $string);
$stm->bindValue(3, $valorTotal);

$stm->execute();

$sql = 'SELECT * FROM compras WHERE user_id = ?;';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $user_id);

$stm->execute();

$historicoCompras = $stm->fetchAll(PDO::FETCH_ASSOC);

#print_r($historicoCompras);

echo "<br><br>Serviços: ".$historicoCompras[count($historicoCompras) -1]['servicos'];
echo "<br><br>Compra: ".$historicoCompras[count($historicoCompras) -1]['compra'];

echo "<br><br>Pagamento: ".$pagamento;
echo "<br><br>Troco: ".$historicoCompras[count($historicoCompras) -1]['compra'] - $pagamento;

?>