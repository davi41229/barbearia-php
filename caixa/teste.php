<?php
require('../conexao.php');

$sql = $pdo->query('SELECT * FROM usuarios ORDER BY name DESC');

$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);


$sql = $pdo->query('SELECT * FROM compras ORDER BY compra DESC');

$compras = $sql->fetchAll(PDO::FETCH_ASSOC);


/*
$sql = $pdo->query('SELECT name FROM usuarios LEFT JOIN compras ON id = user_id ;');

$join = $sql->fetchAll(PDO::FETCH_ASSOC);

SELECT column_name(s)
FROM table1
LEFT JOIN table2
ON table1.column_name = table2.column_name;
*/


print_r($usuarios);

echo "<br><br><br><br>";

print_r($compras);

/*
echo "<br><br>";
print_r($join);
*/

?>

