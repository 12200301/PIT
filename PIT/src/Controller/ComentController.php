<?php

include_once 'Model/Coment.php';

class ComentController {
    private $db;
    private $coment;

    public function __construct($db) {
        $this->db = $db;
        $this->coment = new Coment($db);
    }

    // Método para criar um novo comentário
    public function create_coment($coment, $fk_idUser) {
        $this->coment->coment = $coment;
        $this->coment->fk_idUser = $fk_idUser;

        if($this->coment->create_coment()) {
            return "Comentário criado.";
        } else {
            return "Não foi possível criar comentário.";
        }
    }

    // Método para obter detalhes de um comentário pelo ID
    public function readOne_coment($idComent) {
        $this->coment->idComent = $idComent;
        $this->coment->readOne_coment();

        if($this->coment->coment != null) {
            // Cria um array associativo com os detalhes do comentário
            $coment_arr = array(
                "idComent" => $this->coment->idComent,
                "coment" => $this->coment->coment,
                "fk_idUser" => $this->coment->fk_idUser
            );
            return $coment_arr;
        } else {
            return "Comentário não localizado.";
        }
    }

    // Método para atualizar os dados de um comentário
    public function update_coment($idComent, $coment, $fk_idUser) {
        $this->coment->idComent = $idoComent;
        $this->coment->coment = $coment;
        $this->coment->fk_idUser = $fk_idUser;

        if($this->coment->update_coment()) {
            return "Comentário atualizado.";
        } else {
            return "Não foi possível atualizar o comentário.";
        }
    }

    // Método para excluir um comentário pelo ID
    public function delete_coment($idComent) {
        $this->coment->idComent = $idComent;

        if($this->coment->delete_coment()) {
            return "Comentário foi excluído.";
        } else {
            return "Nao foi possível excluir comentário.";
        }
    }
    // Método para listar todos os comentários
    public function index_coment() {
        return $this->coment->readAll_coment();
    }
}
?>