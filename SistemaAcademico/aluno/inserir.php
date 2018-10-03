<?php

session_start();

ini_set("display_errors", true);

include '../bd/conectar.php';

$sql_id = "select id from usuario where username = '$_SESSION[username]'";

$retorno_id = mysqli_query($conexao, $sql_id);

$usuario_id = mysqli_fetch_array($retorno_id);

$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$dataN = $_POST['dataN'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$nacionalidade = $_POST['nacionalidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$renda_id = $_POST['renda_id'];

$sql = "insert into aluno (nome, email, sexo, dataN, rg, cpf, nacionalidade, bairro, rua, complemento, cep, numero, usuario_id, renda_id) values "
        . "('$nome', '$email', '$sexo', '$dataN', '$rg', '$cpf', '$nacionalidade', '$bairro', '$rua', '$complemento', "
        . "'$cep', $numero, $usuario_id[0], $renda_id)";

if (@mysqli_query($conexao, $sql)) {
    echo  "<script>alert('Aluno cadastrado com sucesso!')</script>";
    echo '<br> <a href=form_inserir.php>Continuar cadastrando</a>   <a href=listar.php>Ir para gerenciamento</a>';
} else {
    echo  "<script>alert('Não foi possível realizar o cadastro!')</script>";
  echo '<a href=form_inserir.php>Tentar novamente</a> <a href=listar.php>Ir para gerenciamento</a>';
}
?>



