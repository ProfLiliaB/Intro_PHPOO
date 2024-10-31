<?php
include_once 'Database.php';

class Usuario {
    private static $conn;
    private static $table_name = "usuario";
    private $nome;
    private $email;
    private $cpf;
    private $senha;
    private $status;

    public function __construct(
            String $nome, 
            String $email, 
            String $cpf, 
            String $senha, 
            int $status
        ) {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->senha = $senha;
        $this->status = $status;
    }

    public function create() {
        $database = new Database();
        self::$conn = $database->getConnection();
        $query = "INSERT INTO " . self::$table_name . " (nome, email, cpf, senha, status) VALUES (:nome, :email, :cpf, :senha, :status)";
        $stmt = self::$conn->prepare($query);
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
    public static function read() {
        $database = new Database();
        self::$conn = $database->getConnection();
        $query = "SELECT * FROM " . self::$table_name;
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function delete($cpf) {
        $database = new Database();
        self::$conn = $database->getConnection();
        $query = "DELETE FROM " . self::$table_name . " WHERE cpf = :cpf";
        $stmt = self::$conn->prepare($query);
        $stmt->bindParam(":cpf", $cpf);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function update() {
        $database = new Database();
        self::$conn = $database->getConnection();
        $query = "UPDATE " . self::$table_name . " SET nome = :nome, email = :email, cpf = :cpf, senha = :senha, status = :status WHERE cpf = :cpf";
        $stmt = self::$conn->prepare($query);
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
    public static function search($keyword) {
        $database = new Database();
        self::$conn = $database->getConnection();
        $query = "SELECT * FROM " . self::$table_name . " WHERE nome LIKE ? OR email LIKE ? OR cpf LIKE ?";
        $stmt = self::$conn->prepare($query);
        $keyword = htmlspecialchars(strip_tags($keyword));
        $keyword = "%{$keyword}%";
        $stmt->bindParam(1, $keyword);
        $stmt->bindParam(2, $keyword);
        $stmt->bindParam(3, $keyword);
        $stmt->execute();
        return $stmt;
    }
    public function logar(): mixed {
        $database = new Database();
        self::$conn = $database->getConnection();
        $query = "SELECT * FROM ".self::$table_name." WHERE email = ?";
        $stmt = self::$conn->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
           return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}