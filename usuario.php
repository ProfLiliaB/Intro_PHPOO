<?php
include_once 'Database.php';

class Usuario {
    private $conn;
    private $table_name = "usuario";

    public $nome;
    public $email;
    public $cpf;
    public $senha;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, email=:email, cpf=:cpf, senha=:senha, status=:status";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->senha = htmlspecialchars(strip_tags($this->senha));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":status", $this->status);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($query);

        $this->cpf = htmlspecialchars(strip_tags($this->cpf));

        $stmt->bindParam(":cpf", $this->cpf);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, email = :email, cpf = :cpf, senha = :senha, status = :status WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->senha = htmlspecialchars(strip_tags($this->senha));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":status", $this->status);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function search($keyword) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nome LIKE ? OR email LIKE ? OR cpf LIKE ?";
        $stmt = $this->conn->prepare($query);
    
        $keyword = htmlspecialchars(strip_tags($keyword));
        $keyword = "%{$keyword}%";
    
        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->bindParam(3, $keyword);
    
        $stmt->execute();
        return $stmt;
    }
}
