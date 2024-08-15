<?php
include_once 'Database.php';
include_once 'Usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

$search = isset($_POST['search']) ? $_POST['search'] : '';

if ($search) {
    $stmt = $usuario->search($search);
} else {
    $stmt = $usuario->read();
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td data-label='Nome'>" . htmlspecialchars($row['nome']) . "</td>";
    echo "<td data-label='Email'>" . htmlspecialchars($row['email']) . "</td>";
    echo "<td data-label='CPF'>" . htmlspecialchars($row['cpf']) . "</td>";
    echo "<td data-label='Status'>" . htmlspecialchars($row['status']) . "</td>";
    echo "<td><a href='processa.php?id=" . htmlspecialchars($row['cpf']) . "'>Excluir</a></td>";
    echo "</tr>";
}