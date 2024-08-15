<?php
//Conexão poliglota com PDO
//Conexão com PostgreSQL
$host = '127.0.0.1';
$db = 'nome_do_banco';
$user = 'usuario';
$pass = 'senha';
$port = '5432';
$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass";

//Conexão com SQLite
$path = 'caminho/para/o/banco.sqlite';
$dsn = "sqlite:$path";

//Conexão com SQL Server
$serverName = "localhost";
$database = "nome_do_banco";
$username = "usuario";
$password = "senha";
$dsn = "sqlsrv:server=$serverName;Database=$database";

//Conexão com MySQL
$host = '127.0.0.1';
$db = 'nome_do_banco';
$user = 'usuario';
$pass = 'senha';

$dsn = "mysql:host=$host;dbname=$db";

$pdo = new PDO($dsn, $user, $pass);