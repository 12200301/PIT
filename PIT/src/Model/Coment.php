<?php

class Coment {
    private $conn;
    public $table_name = "comentarios";

    public $idComent;
    public $coment;
    public $datahora;
    public $fk_idUser;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo comentário
    public function create_coment() {
        $query = "INSERT INTO " . $this->table_name . " (coment, datahora, fk_idUser) VALUES (:coment, now(), :fk_idUser)";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->coment = htmlspecialchars(strip_tags($this->coment));
        $this->fk_idUser = htmlspecialchars(strip_tags($this->fk_idUser));

        // Bind parameters
        $stmt->bindParam(':coment', $this->coment);
        $stmt->bindParam(':fk_idUser', $this->fk_idUser);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Read - Obter detalhes de um comentário pelo ID
    public function readOne_coment() {
        $query = "SELECT coment, datahora, fk_idUser FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idComent);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->coment = $row['coment'];
        $this->datahora = $row['datahora'];
        $this->fk_idUser = $row['fk_idUser'];
    }

    // Update - Atualizar os dados de um comentário
    public function update_coment() {
        $query = "UPDATE " . $this->table_name . " SET coment = :coment, datahora = now() WHERE idComent = :idComent";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->idComent = htmlspecialchars(strip_tags($this->idComent));
        $this->coment = htmlspecialchars(strip_tags($this->coment));
        $this->datahora = htmlspecialchars(strip_tags($this->datahora));

        // Bind parameters
        $stmt->bindParam(':ididComent', $this->idComent);
        $stmt->bindParam(':coment', $this->coment);
        $stmt->bindParam(':datahora', $this->datahora);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete - Excluir um comentário pelo ID
    public function delete_coment() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idComent = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idComent);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function readAll_coment() {
        $query = "SELECT idComent, coment, fk_idUser FROM " . $this->coment->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $coments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $coments;
    }
}
?>