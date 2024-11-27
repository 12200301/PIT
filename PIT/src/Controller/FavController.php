<?php

include_once 'Model/Fav.php';

class FavController {
    private $db;
    private $fav;

    public function __construct($db) {
        $this->db = $db;
        $this->fav = new Fav($db);
    }

    // Método para criar um novo favorito
    public function create_fav($fk_idUser, $fk_idPlace) {
        $this->fav->fk_idUser = $fk_idUser;
        $this->fav->fk_idPlace = $fk_idPlace;

        if($this->fav->create_fav()) {
            return "Favorito adicionado.";
        } else {
            return "Não foi possível adicionar favorito.";
        }
    }

    // Método para obter detalhes de um favorito pelo ID
    public function readOne_fav($idFav) {
        $this->fav->idFav = $idFav;
        $this->fav->readOne_fav();

        if($this->fav->fk_idPlace != null) {
            // Cria um array associativo com os detalhes do favorito
            $user_arr = array(
                "idFav" => $this->fav->idFav,
                "fk_idUser" => $this->fav->fk_idUser,
                "fk_idPlace" => $this->fav->fk_idPlace
            );
            return $fav_arr;
        } else {
            return "Favorito não localizado.";
        }
    }

    // Método para atualizar os dados de um favorito
    public function update_fav($idFav, $fk_idUser, $fk_idPlace) {
        $this->fav->idFav = $idFav;
        $this->fav->fk_idUser = $fk_idUser;
        $this->fav->fk_idPlace = $fk_idPlace;

        if($this->fav->update_fav()) {
            return "Favorito atualizado.";
        } else {
            return "Não foi possível atualizar o favorito.";
        }
    }

    // Método para excluir um favorito pelo ID
    public function delete_fav($fk_idPlace) {
        $this->fav->fk_idPlace = $fk_idPlace;

        if($this->fav->delete_fav()) {
            return "Favorito foi excluído.";
        } else {
            return "Nao foi possível excluir favorito.";
        }
    }
    // Método para listar todos os favoritos
    public function index_fav() {
        return $this->fav->readAll_fav();
    }
    
}
?>