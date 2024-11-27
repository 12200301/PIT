<?php

error_reporting(E_ALL ^ E_DEPRECATED);

class User {
    private $conn;
    public $table_name = "usuarios";

    public $idUser;
    public $name;
    public $email;
    public $senha;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo usuário
    public function create_user() {
        $query = "INSERT INTO " . $this->table_name . " (name, email, senha) VALUES (:name, :email, :senha)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Bind parameters
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um usuário pelo ID
    public function readOne_user() {
        $query = "SELECT name, email, senha FROM " . $this->table_name . " WHERE idUser = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idUser);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->senha = $row['senha'];
    }

    // Update - Atualizar os dados de um usuário
    public function update_user() {
        $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email, senha = :senha WHERE idUser = :idUser";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->idUser = htmlspecialchars(strip_tags($this->idUser));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Bind parameters
        $stmt->bindParam(':idUser', $this->idUser);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um usuário pelo ID
    public function delete_user() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idUser = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idUser);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
     // Método para listar todos os usuários (exemplo adicional)
     public function readAll_user() {
        $query = "SELECT idUser, name, email FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}
?>