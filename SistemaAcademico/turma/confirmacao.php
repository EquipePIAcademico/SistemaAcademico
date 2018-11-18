<?php
include_once '../cabecalho.php';

$id = $_GET['id'];
?>
<h3>Deseja realmente excluir?</h3>

<a class="cancelar" href=listar.php>Cancelar</a><a class="confirmar" href=excluir.php?id=<?= $id ?>>Confirmar</a>


