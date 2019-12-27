<?php
include_once("ConexaoBD.php");
include_once("Funcao.php");
if (isset($_POST['alterar'])){
    $id_ficha = $_POST['idficha'];
    $culto_data = $_POST["data"];
    $nome_crianca = $_POST['nome'];
    $idade = $_POST['idade'];
    $res_ali = $_POST['res_ali'];
    $nome_pais = $_POST["pais"];
    $telefone = $_POST["tell"];
    $telefone_2 = $_POST["tell2"];
    
    $f = new Funcao();
    $fun = $f->altera_ficha($id_ficha, $culto_data, $nome_crianca, $idade, $res_ali, $nome_pais, $telefone, $telefone_2);
    header('location: Lista.php');
}
if (isset($_GET['editar'])) {
        $id_ficha = $_GET['editar'];
            
        $f = new funcao();
        $fun = $f->consulta_ficha($id_ficha); 
        foreach($fun as $res) {
            $id_ficha = $res->getIdficha();
            $culto_data = $res->getCulto_data();
            $nome_crianca = $res->getNocrianca();
            $idade = $res->getIdade();
            $res_ali = $res->getRestri();
            $nome_pais = $res->getNopais();
            $telefone = $res->getTelefone();
            $telefone_2 = $res->getTelefone_2();
            } 
        }
?>
<html>
    <head>
        <title>Alterar Ficha</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <h1 align="center">Alterar Ficha</h1>
        <form action="Altera.php" method="POST">
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
                        <td><input type="text" name="idficha" value="<?php echo $id_ficha ?>" readonly=""/></td>
                        <td><input type="text" name="data" value="<?php echo $culto_data ?>"/></td>
                        <td><input type="text" name="nome" value="<?php echo $nome_crianca ?>"/></td>
                        <td><input type="text" name="idade" value="<?php echo $idade ?>"/></td>
                        <td><input type="text" name="res_ali" value="<?php echo $res_ali ?>"/></td>
                        <td><input type="text" name="pais" value="<?php echo $nome_pais ?>"/></td>
                        <td><input type="text" name="tell" value="<?php echo $telefone ?>"/></td>
                         <td><input type="text" name="tell2" value="<?php echo $telefone_2 ?>"/></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <a href="Lista.php" class="btn orange left"><i class="material-icons" title="Voltar">keyboard_return</i></a>
        <button type="submit" name="alterar" class="btn green right" title="Salvar"><i class="material-icons">save</button>
        </div>
    </body>
</html>