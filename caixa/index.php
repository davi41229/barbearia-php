<?php
require('../conexao.php');

$sql = $pdo->query('SELECT * FROM usuarios ORDER BY name DESC');

$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);


$sql = $pdo->query('SELECT * FROM servicos ORDER BY name DESC');

$servicos = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 

    <link rel="icon" href="../images/logo.jpeg">

    <title>Compra</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- CSS DO PROJETO -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>

    <form action="compras.php" method="post">
        
        <h4>Cliente:</h4>

        <select name="user_id" id="">
            
            <?php foreach($usuarios as $um): ?>

                <option value="<?php echo $um['id'] ?>"><?php echo $um['name'] ?> ---> <?php echo $um['instagram'] ?></option>

            <?php endforeach; ?>

        </select>

        <br><br><br>

        <h4>Serviços:</h4>

        <?php foreach($servicos as $um): ?>

            <div class="row">                

                <div class="col-lg-4">
                    
                    <img class="rounded-circle" class="img-responsive" src="../images/<?php echo $um['photo']; ?>" alt="Generic placeholder image" width="100" height="100">
                    <p style="margin-left: 10px; font-size: 20px;"><?php echo $um['name']; ?> <input name="servicos[]" value="<?php echo $um['name']; ?>,<?php echo $um['price']; ?>" class="form-check-input" type="checkbox" id="inlineFormCheck"></p>
                      
                </div>
                
            </div>

        <?php endforeach; ?>

        <br>
        
        <label for="">Pagamento</label>
        <input type="text" name="pagamento" id="">

        <button type="submit">Finalizar Compra</button>

    </form>
</body>
</html>