<?php

class Fav {
    private $conn;
    public $table_name = "favoritos";

    public $idFav;
    public $fk_idUser;
    public $fk_idPlace;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Criar um novo favorito
    public function create_fav() {
        $query = "INSERT INTO " . $this->table_name . " (fk_idUser, fk_idPlace) VALUES (:fk_idUser, :fk_idPlace)";
        $stmt = $this->conn->prepare($query);
    
        // Sanitize inputs
        $this->fk_idUser = htmlspecialchars(strip_tags($this->fk_idUser));
        $this->fk_idPlace = htmlspecialchars(strip_tags($this->fk_idPlace));
    
        // Bind parameters
        $stmt->bindParam(':fk_idUser', $this->fk_idUser);
        $stmt->bindParam(':fk_idPlace', $this->fk_idPlace);
    
        try {
            // Tenta executar a consulta
            if ($stmt->execute()) {
                return "Local favoritado com sucesso."; // Somente se a inserção for bem-sucedida
            }
        } catch (PDOException $e) {
            // Verifica se o erro é relacionado à duplicidade na coluna com UNIQUE
            if ($e->getCode() == 23000) { // Código 23000 refere-se a uma violação de restrição de integridade, como UNIQUE
                return "Erro: o local já foi favoritado.";  // Mensagem personalizada para duplicidade
            } else {
                // Exibir o erro completo para debug
                return "Erro ao favoritar: " . $e->getMessage();  // Outros erros
            }
        }
    
        return false; // Retorna falso se nenhuma ação foi tomada
    }
    

    // Read - Obter detalhes de um favorito pelo ID
    public function readOne_fav() {
        $query = "SELECT fk_idUser, fk_idPlace FROM " . $this->table_name . " WHERE idFav = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idFav);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->fk_idUser = $row['fk_idUser'];
        $this->fk_idPlace = $row['fk_idPlace'];
    }

    // Update - Atualizar os dados de um favorito
    public function update_fav() {
        $query = "UPDATE " . $this->table_name . " SET fk_idUser = :fk_idUser, fk_idPlace = :fk_idPlace WHERE idFav = :idFav";
        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->idFav = htmlspecialchars(strip_tags($this->idFav));
        $this->fk_idUser = htmlspecialchars(strip_tags($this->fk_idUser));
        $this->fk_idPlace = htmlspecialchars(strip_tags($this->fk_idPlace));

        // Bind parameters
        $stmt->bindParam(':idFav', $this->idFav);
        $stmt->bindParam(':fk_idUser', $this->fk_idUser);
        $stmt->bindParam(':fk_idPlace', $this->fk_idPlace);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
   

    // Delete - Excluir um favorito pelo ID
    public function delete_fav() {
        $query = "DELETE FROM " . $this->table_name . " WHERE fk_idPlace = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->fk_idPlace);

        if ($stmt->execute()) {
            return true;
        } else {
            return false; 
        }
    }

    // Método para listar todos os favoritos (exemplo adicional)
    public function readAll_fav() {
        $query = "select fk_idPlace, nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from " . $this->table_name . " inner join Places on(idPlace = fk_idPlace)";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $favs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $favs;
        }
        
    }
}
?>