<?php
include_once("ConexaoBD.php");
include_once("Funcao.php");

if (isset($_POST['cadastra'])){
    $id_ficha = $_POST['idficha'];
    $culto_data = $_POST["data"];
    $nome_crianca = $_POST['nome'];
    $idade = $_POST['idade'];
    $res_ali = $_POST['res_ali'];
    $nome_pais = $_POST["pais"];
    $telefone = $_POST["tell"];
    $telefone_2 = $_POST["tell2"];
    
    $f = new funcao();
    $fun = $f->insere($matricula, $nome, $codepto, $salario);
    header('location: Lista.php');}
?>
<html>
    <head>
        <title>Cadastra Ficha</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
        <h1 align="center">Cadastrar Ficha</h1>
<form action="Cadastra2.php" method="POST">
            <table border="1">
                <tbody>
                    <thead>
                    <tr>
                        <td>ID:</td>
                        <td>Data:</td>
                        <td>Nome:</td>
                        <td>Idade:</td>
                        <td>Restrição Alimentar:</td>
                        <td>Responsável:</td>
                        <td>Contato:</td>
                        <td>Contato 2:</td>
                    </tr>
                    </thead>
                    <tr>
                        <td><input type="text" name="idficha" value=""/></td>
                        <td><input type="text" name="data" value=""/></td>
                        <td><input type="text" name="nome" value=""/></td>
                        <td><input type="text" name="idade" value=""/></td>
                        <td><input type="text" name="res_ali" value=""/></td>
                        <td><input type="text" name="pais" value=""/></td>
                        <td><input type="text" name="tell" value=""/></td>
                         <td><input type="text" name="tell2" value=""/></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <a href="Lista.php" class="btn orange left"><i class="material-icons" title="Voltar">keyboard_return</i></a>
        <button type="submit" name="alterar" class="btn green right" title="Salvar"><i class="material-icons">save</button>
    </div>
    </body>
</html>