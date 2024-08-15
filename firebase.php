<?php
// Conexão e Operações CRUD com Firebase
//composer require kreait/firebase-php
require 'vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/path/to/firebase_credentials.json');
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://your-database-name.firebaseio.com')//URL banco Firebase
    ->create();

$database = $firebase->getDatabase();

// Create
$newUser = $database
    ->getReference('usuarios')
    ->push([
        'nome' => 'John Doe',
        'email' => 'john.doe@example.com',
        'cpf' => '12345678900',
        'senha' => 'password123',
        'status' => 'ativo'
    ]);

// Read
$usuarios = $database
    ->getReference('usuarios')
    ->getValue();

foreach ($usuarios as $key => $usuario) {
    echo $usuario['nome'] . ' - ' . $usuario['email'] . '<br>';
}

// Update
$database
    ->getReference('usuarios/' . $newUser->getKey())
    ->update([
        'nome' => 'John Doe atualizado'
    ]);

// Delete
$database
    ->getReference('usuarios/' . $newUser->getKey())
    ->remove();