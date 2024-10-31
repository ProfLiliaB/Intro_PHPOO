<?php
include_once '../classes/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $user = new Usuario('', $login, '', $senha, 0);

    if ($x = $user->logar($login)) {
        if ($x['senha'] == $senha) {
            echo "Autenticado!";
        } else {
            echo "Login ou senha inválidos!";
        }
    } else {
        echo "Login ou senha inválidos!";
    }
}
