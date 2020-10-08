<?php
require 'database.php';

$base = new basedados();

if($_POST){// comando para deletar

    $base->deletar($_POST['id']);
    // redireciona a pagina
    echo '<script>window.location="/"</script>';


}

// lista dos doadores cadastrados
$doadores = $base->listar();

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
        <a href="adicionar.php" class="btn btn-primary">Adicionar</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Intervalo</th>
                    <th scope="col">Forma de pagamento</th>
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
                    <td class="telefone"><?=$doador['telefone']?></td>
                    <td class="valor"><?=$doador['valor']?></td>
                    <td>
                        <?php
                            switch($doador['intervalo']){
                                case "U":
                                    echo "Único";
                                break;
                                case "B":
                                    echo "Bimestral";
                                break;
                                case "S":
                                    echo "Semestral";
                                break;
                                case "A":
                                    echo "Anual";
                                break;
                            }
                        ?>
                    </td>
                    <td><?=($doador['forma_pagamento']=='D') ? 'Débito' : 'Crédito' ?></td>
                    <td>
                        <a href="editar.php?id=<?=$doador['id']?>" class="btn btn-primary">Editar</a>
                        <button onclick="apagar(<?=$doador['id']?>)" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>            
            </tbody>
            </table>
            <form id="form_delete" action="index.php" method="post">
                <input type="hidden" id="id_delete" name="id">
            <form>
        </div>

    </body>
</html>
<script src="js/jquery.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script>
    $('.cpf').mask('000.000.000-00');
    $('.valor').mask('R$0.000.000.000,00', {reverse: true});
    $('.telefone').mask('(00) 0000-0000');

    function apagar(id){
        if(window.confirm('Deseja excluir o registro?')){
            $('#id_delete').val(id);
            $('#form_delete').submit();

        }
    }
</script>
