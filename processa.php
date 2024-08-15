<?php
include_once 'Database.php';
include_once 'Usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

$action = isset($_POST['action']) ? $_POST['action'] : "";

if (isset($_GET['id'])) {
    $action = "delete";
}

switch ($action) {
    case 'create':
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->cpf = $_POST['cpf'];
        $usuario->senha = $_POST['senha'];
        $usuario->status = $_POST['status'];
        if ($usuario->create()) {
            //header("location: /?status=ok");
            echo "Usuário cadastrado com sucesso!";
        } else {
            //header("location: /?status=erro");
            echo "Erro ao cadastrar usuário.";
        }
        break;
    case 'update':
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->cpf = $_POST['cpf'];
        $usuario->senha = $_POST['senha'];
        $usuario->status = $_POST['status'];
        if ($usuario->update()) {
            //header("location: ./?status=ok");
            echo "Usuário atualizado com sucesso!";
        } else {
            //header("location: ./?status=erro");
            echo "Erro ao atualizar usuário.";
        }
        break;
    case 'delete':
        $usuario->cpf = isset($_POST['cpf'])? $_POST['cpf'] : $_GET['id'];
        if ($usuario->delete()) {
            //header("location: ./?status=ok");
            echo "Usuário deletado com sucesso!";
        } else {
            //header("location: ./?status=erro");
            echo "Erro ao deletar usuário.";
        }
        break;
    default:
        echo "Ação inválida.";
        break;
}