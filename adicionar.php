<?php
require 'database.php';

if($_POST){

    $base = new basedados();
    $base->adicionar($_POST);

    echo '<script>window.location="/"</script>';

}



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
        <h1 class="text-center">Adicionar doador</h1>
        <form method="post" action="adicionar.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" maxlenght="200" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" maxlenght="200" required aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Data de nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Intervalo de doação</label>
                <select class="form-control" id="intervalo" name="intervalo" required>
                    <option></option>
                    <option value="U">Única</option>
                    <option value="B">Bimestral</option>
                    <option value="S">Semestral</option>
                    <option value="A">Anual</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Valor</label>
                <input type="text" class="form-control" id="valor" name="valor" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Forma de pagamento</label>
                <select class="form-control" id="forma_pagamento" name="forma_pagamento" required>
                    <option></option>
                    <option value="D">Débito</option>
                    <option value="C">Crédito</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Endereço</label>
                <textarea class="form-control" id="endereco" name="endereco" required></textarea>
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