<?php
require('../conexao.php');

$sql = $pdo->query('SELECT name, compra, user_id FROM usuarios LEFT JOIN compras ON usuarios.id = compras.user_id ;');

$join = $sql->fetchAll(PDO::FETCH_ASSOC);

/*
SELECT column_name(s)
FROM table1
LEFT JOIN table2
ON table1.column_name = table2.column_name;
*/

print_r($join);
echo "<br><br>";
/*
foreach ($join as $um) {
    echo "<br>".$um['name']." comprou ".$um['compra'].",00R$<br>";
}
*/
$arrayUsuarios = [];


for ($i=0; $i < count($join); $i++) { 
    
    $loops = 0;
    $somaCompras = 0;

    for ($j=0; $j < count($join); $j++) { 

        if ($join[$j]['name'] == $join[$i]['name']) {
            echo "<br>".$join[$j]['name']." comprou ".$join[$j]['compra']."<br>";

            $somaCompras = $somaCompras + $join[$j]['compra'];
            echo "<br>".$somaCompras."<br>";
        }

        $loops++;
        
    }

    echo "<br>Quantidade de  loops ".$loops."<br>";
    echo "<br> Terminada volta ".$i." com a compra no total de ".$somaCompras." para ".$join[$i]['name']." com id: ".$join[$i]['user_id']."<br>";
}



?>

