<?php
require('../conexao.php');

$sql = $pdo->query('SELECT * FROM usuarios ORDER BY name DESC');

$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>
<body>

    <form action="" method="get">
        <select name="" id="">
            
            <?php foreach($usuarios as $um): ?>

                <option value="<?php echo $um['id'] ?>"><?php echo $um['name'] ?></option>

            <?php endforeach; ?>

        </select>


    </form>
</body>
</html>