<?php
require('../conexao.php');


$user_id = $_POST['user_id'];
$servicos = $_POST['servicos'];
$compra = 150;#$_POST['compra'];

$string = implode(",", $servicos); 

echo "id: ".$user_id."<br>";
echo "implodido ".$string."<br>";
echo "compra: ".$compra."<br>";

$explode = explode(",", $string);

echo "<br><br> explodido";
print_r($explode);

foreach ($explode as $um) {
    echo "<br><br>";
    echo "item-> ".$um."<br><br>";
}

print_r($explode);

$soValores = [];

/*$explode = array("laranja", "morango");
array_push($cesta, "melancia", "batata");
print_r($cesta);
*/ 

for ($i=0; $i < count($explode); $i++) { 
    echo "<br>item ".$i." ---> ".$explode[$i]."<br>";

    if ($i % 2 == 1) {
        echo $i." é impar<br>";
        
        array_push($soValores, $explode[$i]);
    }
}

print_r($soValores);


$sql = 'INSERT INTO compras (user_id, servicos, compra) VALUES (?, ?, ?);';

$stm = $pdo->prepare($sql);

$stm->bindValue(1, $user_id);
$stm->bindValue(2, $servicos);
$stm->bindValue(3, $compra);

$stm->execute();

$historicoCompras = $stm->fetchAll(PDO::FETCH_ASSOC);

print_r($historicoCompras);

?>