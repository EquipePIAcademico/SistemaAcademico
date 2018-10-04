<?php

session_start();

function logar($perfil_acesso, $username) {
    $_SESSION['perfil_acesso'] = $perfil_acesso;
    $_SESSION['username'] = $username;
    iniciarTempoSessao();
}

function deslogar() {
    session_destroy();
}

function sessaoExpirada() {
    if ($_SESSION['tempo'] < time()) {
        return true;
    } else {
        // reiniciar sessao
        iniciarTempoSessao();
        return false;
    }
}

function autenticar() {
    //se NAO estaLogado ou sessaoExpirada
    if (!estaLogado() || sessaoExpirada()) {
        deslogar();
        header('Location: form_login.php');
    } else {
        return true;
    }
}

function estaLogado() {
    return isset($_SESSION['username']);
}

function exibirPerfilAcesso() {
    return $_SESSION['perfil_acesso'];
}

function exibirUsername() {
    return $_SESSION['username'];
}

function iniciarTempoSessao() {
    $_SESSION['tempo'] = time() + 10;
}

