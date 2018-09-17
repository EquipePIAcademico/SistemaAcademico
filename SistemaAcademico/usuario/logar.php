
<?php

include './autenticacao.php';

ini_set("display_errors", true);

$perfil_acesso = $_POST['perfil_acesso'];
$username = $_POST['username'];
$password = $_POST['password'];

include '../bd/conectar.php';

$sql = "select * from usuario where (perfil_acesso = '$perfil_acesso' and username = '$username') and password = '$password'";

$retorno = mysqli_query($conexao, $sql);

$resultado = mysqli_fetch_array($retorno);

if ($resultado == null) {
    echo 'usuário nao encontrado';
    echo '<a href=form_login.php>Logar</a>';
} else {
    logar($resultado['perfil_acesso'], $resultado['username']);

    header('Location: ../index.php');
}
?>
</html>

