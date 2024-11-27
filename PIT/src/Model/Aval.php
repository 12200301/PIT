<?php

class Aval {
    private $conn;
    public $table_name = "avaliacoes";

    public $fk_idPlace;
    public $fk_idUser;
    public $nota;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo avaliação
    public function create_aval() {
        $query = "INSERT INTO " . $this->table_name . " (fk_idPlace, fk_idUser, nota) VALUES (:fk_idPlace, :fk_idUser, :nota)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->fk_idPlace = htmlspecialchars(strip_tags($this->fk_idPlace));
        $this->fk_idUser = htmlspecialchars(strip_tags($this->fk_idUser));
        $this->nota = htmlspecialchars(strip_tags($this->nota));

        // Bind parameters
        $stmt->bindParam(':fk_idPlace', $this->fk_idPlace);
        $stmt->bindParam(':fk_idUser', $this->fk_idUser);
        $stmt->bindParam(':nota', $this->nota);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de uma avaliação pelo ID
    public function readOne_aval() {
        $query = "SELECT nota FROM " . $this->table_name . " WHERE fk_idPlace = $idPlace and fk_id_user = $id LIMIT 0,1";
        $stmt = $this->conn->prepare(-$query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->aval = $row['nota'];
    }
    
    // Método para listar todos as avaliações
     public function readAll_aval() {
        $query = "SELECT avg(nota) as nota FROM " . $this->aval->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $avals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $avals;
    }
}
?>