<?php
include_once 'Database.php';
include_once 'Usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($_POST['nome'], $_POST['email'], $_POST['cpf'], $_POST['senha'], $_POST['status']);

$action = isset($_POST['action']) ? $_POST['action'] : "";

if (isset($_GET['id'])) {
    $action = "delete";
}

switch ($action) {
    case 'create':
        if ($usuario->create()) {
            //header("location: /?status=ok");
            echo "Usuário cadastrado com sucesso!";
        } else {
            //header("location: /?status=erro");
            echo "Erro ao cadastrar usuário.";
        }
        break;
    case 'update':
        if ($usuario->update()) {
            //header("location: ./?status=ok");
            echo "Usuário atualizado com sucesso!";
        } else {
            //header("location: ./?status=erro");
            echo "Erro ao atualizar usuário.";
        }
        break;
    case 'delete':
        $cpf = isset($_POST['cpf'])? $_POST['cpf'] : $_GET['id'];
        if ($usuario->delete($cpf)) {
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