<!DOCTYPE html>
<html>
    <head>
        <title>Confirmar exclusão</title>
        <meta charset="utf-8">


<?php
include_once '../cabecalho.php';

$id = $_GET['id'];
?>
<h3>Deseja realmente excluir?</h3>

<a class="cancelar" href=listar_curso.php>Cancelar</a><a class="confirmar" href=excluir.php?id=<?= $id ?>>Confirmar</a>


