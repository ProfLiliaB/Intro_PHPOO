<?php
include_once '../classes/Usuario.php';
$search = isset($_POST['search']) ? $_POST['search'] : '';
if ($search) {
    $stmt = Usuario::search($search);
} else {
    $stmt = Usuario::read();
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