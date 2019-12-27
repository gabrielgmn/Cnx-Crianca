
  <!DOCTYPE html>
  <?php  include('Funcao.php'); ?>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <div class="container">
      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <table class="striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Restrição Alimentar</th>
                    <th>Responsavel</th>
                    <th>Contato</th>
                    <th>Contato</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <h1 align="center">Fichas</h1>
            <?php 
                $f = new funcao(); 
                $fic = $f->lista_ficha();
                foreach($fic AS $res) { ?>
                <tr>
                    <td><?php echo $res->getIdficha(); ?></td>
                    <td><?php echo $res->getCulto_data() ?></td>
                    <td><?php echo $res->getNocrianca() ?></td>
                    <td><?php echo $res->getIdade() ?></td>
                    <td><?php echo $res->getRestri() ?></td>
                    <td><?php echo $res->getNopais() ?></td>
                    <td><?php echo $res->getTelefone() ?></td>
                    <td><?php echo $res->getTelefone_2() ?></td>
                    <td>
                        <a href="Altera.php?editar=<?php echo $res->getIdficha(); ?>" class="btn-floating orange"><i class="material-icons">edit</i></a>
                    </td>
                    <td>
                        <a href="Exclui.php?excluir_ficha=<?php echo $res->getIdficha(); ?>" class="btn-floating orange"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
                <tr>
                    <td><button class="btn-floating green" name="listar" type="button" onclick="location.href='Cadastra.php';"><i class="material-icons">add</i></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="Lista.php" class="btn-floating orange"><i class="material-icons">group</i></a></td>
                    <td><a href="Lista.php" class="btn-floating orange"><i class="material-icons">face</i></a></td>
                </tr>
            <?php } ?>
        </table>
        <?php
            if (isset($_GET['exclusao'])) {
                if ($_GET['exclusao'] == 0){
                    $msg  = "<p name = 'msg' id='msg' class = 'msg_erro'>";
                    $msg .= "Exclusão não pôde ser realizada.</p>";                  
                    echo $msg;
                }
            }
        ?>
    </div>
    </body>
  </html>
 