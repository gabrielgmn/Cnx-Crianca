<?php
include_once ("Funcao.php");
if(isset($_GET['excluir_ficha'])){
    $id = $_GET['excluir_ficha'];
    
    $f = new funcao();
    $fun = $f->exclui_ficha($id);
    header('location: Lista.php');
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

