<?php
$id = $_GET['id'];

echo "Deseja realmente excluir?" . "<br>";

?>
<a href=listar.php>Cancelar</a><a href=excluir.php?id=<?= $id ?>>Confirmar</a>
<?php

