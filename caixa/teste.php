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

#print_r($join);
#echo "<br><br>";


$name = "";
$names = [];

for ($i=0; $i < count($join); $i++) { 
    
    $loops = 0;
    $somaCompras = 0;
    
    if ($name != $join[$i]['name']) {
        
        #veja se $join[$i]['name'] já está no $names
        
        $existe = 0;
        $noexiste = 0;

        for ($k=0; $k < count($names); $k++) { 
            
            if ($join[$i]['name'] == $names[$k]) {

                $existe++;
            }
            
            if($join[$i]['name'] != $names[$k]) {

                $noexiste++;
            }

        }
        
        #se não estiver faça:

        for ($j=0; $j < count($join); $j++) {
    
            if ($existe <= 0 && $join[$j]['name'] == $join[$i]['name']) {
            
                #echo "<br>".$join[$j]['name']." comprou ".$join[$j]['compra']."<br>";
        
                $somaCompras = $somaCompras + $join[$j]['compra'];
                #echo "<br>".$somaCompras."<br>";
            }
        
            $loops++;        
        }

    }

    #echo "<br>Quantidade de  loops ".$loops."<br>";
    #echo "<br> Terminada volta ".$i." com a compra no total de ".$somaCompras." para ".$join[$i]['name']." com id: ".$join[$i]['user_id']."<br>";
    
    if ($somaCompras != 0) {

        echo "<br> Terminada volta ".$i." com a compra no total de ".$somaCompras." para ".$join[$i]['name']." com id: ".$join[$i]['user_id']."<br>";
        echo "<br> ------------------------------------------------------------------------------------------------------ <br>";
    }

    
    $name = $join[$i]['name'];
    #echo "<br>".$name."<br>";
    
    array_push($names, $name);
    #echo "<br>".print_r($names)."<br>";
    #echo "<br>existe ".$existe."<br>";
    #echo "<br>noexiste ".$noexiste."<br>";
    #echo "<br> ------------------------------------------------------------------------------------------------------ <br>";

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
    <style>
        body {
            background-color: #333;
            color: #ddd;
        }
    </style>
</head>
<body>
    
</body>
</html>

