<?php

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
    public function create() {

                $query = "INSERT INTO " . $this->table_name . " (name, email, senha) VALUES (:name, :email, :senha)";
                $stmt = $this->conn->prepare($query);

                //Sanitize inputs
                $this->name = htmlspecialchars(strip_tags($this->name));
                $this->email = htmlspecialchars(strip_tags($this->email));
                $this->senha = htmlspecialchars(strip_tags($this->senha));

                //Bind parameters
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':senha', $this->senha);
                
                try {
                    if ($stmt->execute()) {
                        return true;
                    } else {
                        return false;
                    }
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo " ";
                }       
    }

}
?>