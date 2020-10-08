<?php
require 'database.php';

$base = new basedados();

$doadores = $base->listar();

// print_r($doadores);

// echo 'lll';

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
    </head>
    <body>
        <div class="container">
        <h1 class="text-center">Lista de doadores</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Valor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($doadores as $doador):
            ?>
                <tr>
                    <th scope="row"><?=$doador['id']?></th>
                    <td><?=$doador['nome']?></td>
                    <td class="cpf"><?=$doador['cpf']?></td>
                    <td><?=$doador['email']?></td>
                    <td><?=$doador['telefone']?></td>
                    <td class="valor"><?=$doador['valor']?></td>
                    <td><a href="editar.php?id=<?=$doador['id']?>" class="btn">Editar</a></td>
                </tr>
            <?php
            endforeach;
            ?>            
            </tbody>
            </table>
            <form id="form_delete" action="deletar.php" method="post">
                <input type="text" id="id_delete" name="id">
            <form>
        </div>

    </body>
</html>
<script src="js/jquery.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script>
    $('.cpf').mask('000.000.000-00');
    $('.valor').mask('R$0.000.000.000,00', {reverse: true});
</script>
