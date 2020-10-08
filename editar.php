<?php
require 'database.php';

$base = new basedados();

if($_POST){

    
    $base->atualizar($_POST);

    echo '<script>window.location="/"</script>';

}

$doador = $base->retornaDados($_GET['id']);

// print_r($doador);

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
        <h1 class="text-center">Adicionar doador</h1>
        <form method="post" action="editar.php">
            <input type="hidden" name="id" value="<?=$doador['id']?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="nome" value="<?=$doador['nome']?>" name="nome" maxlenght="200" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input type="email" class="form-control" value="<?=$doador['email']?>" id="email" name="email" maxlenght="200" required aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">CPF</label>
                <input type="text" class="form-control" value="<?=$doador['cpf']?>" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Telefone</label>
                <input type="text" class="form-control" value="<?=$doador['telefone']?>" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Data de nascimento</label>
                <input type="date" class="form-control" value="<?=$doador['data_nascimento']?>" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Intervalo de doação</label>
                <select class="form-control" id="intervalo" name="intervalo" required>
                    <option></option>
                    <option value="U"<?=($doador['intervalo']=='U') ? ' selected' : ''?>>Única</option>
                    <option value="B"<?=($doador['intervalo']=='B') ? ' selected' : ''?>>Bimestral</option>
                    <option value="S"<?=($doador['intervalo']=='S') ? ' selected' : ''?>>Semestral</option>
                    <option value="A"<?=($doador['intervalo']=='A') ? ' selected' : ''?>>Anual</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Valor</label>
                <input type="text" class="form-control" id="valor" value="<?=$doador['valor']?>" name="valor" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Forma de pagamento</label>
                <select class="form-control" id="forma_pagamento" name="forma_pagamento" required>
                    <option></option>
                    <option value="D"<?=($doador['forma_pagamento']=='D') ? ' selected' : ''?>>Débito</option>
                    <option value="C"<?=($doador['forma_pagamento']=='C') ? ' selected' : ''?>>Crédito</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Endereço</label>
                <textarea class="form-control" id="endereco" name="endereco" required><?=$doador['endereco']?></textarea>
            </div>           
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </body>
</html>
<script src="js/jquery.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script>
    $('#cpf').mask('000.000.000-00');
    $('#valor').mask('0000000000,00', {reverse: true});
    $('#telefone').mask('(00) 0000-0000');
</script>