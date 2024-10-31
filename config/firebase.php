<?php
// Conexão e Operações CRUD com Firebase
//composer require kreait/firebase-php
require __DIR__.'vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/path/to/firebase_credentials.json');
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://my-app-62833-default-rtdb.firebaseio.com/')//URL banco Firebase
    ->create();

$database = $firebase->getDatabase();

// Create
$newUser = $database
    ->getReference('clientes')
    ->push([
        'nome' => 'John Doe',
        'email' => 'john.doe@example.com',
        'celular' => '1212345678'
    ]);

// Read
$usuarios = $database
    ->getReference('clientes')
    ->getValue();

foreach ($usuarios as $key => $usuario) {
    echo $usuario['nome'] . ' - ' . $usuario['email'] . '<br>';
}

// Update
$database
    ->getReference('clientes/' . $newUser->getKey())
    ->update([
        'nome' => 'John Doe atualizado'
    ]);

// Delete
$database
    ->getReference('clientes/' . $newUser->getKey())
    ->remove();