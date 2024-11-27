<?php

include_once 'Model/Aval.php';

class AvalController {
    private $db;
    private $aval;

    public function __construct($db) {
        $this->db = $db;
        $this->aval = new Aval($db);
    }

    // Método para criar um novo avaliação
    public function create_aval($fk_idPlace, $fk_idUser, $nota) {
        $this->aval->fk_idPlace = $fk_idPlace;
        $this->aval->fk_idUser = $fk_idUser;
        $this->aval->nota = $nota;

        if($this->aval->create_aval()) {
            return "Avaliação criada.";
        } else {
            return "Não foi possível criar avaliação.";
        }
    }

    // Método para obter detalhes de um avaliação pelo ID
    public function readOne_Aval($id) {
        $this->aval->id = $id;
        $this->aval->readOne_Aval();

        if($this->aval->nota != null) {
            // Cria um array associativo com os detalhes do avaliação
            $user_arr = array(
                "nota" => $this->aval->nota,
            );
            return $aval_arr;
        } else {
            return "Avaliação não localizada.";
        }
    }

    public function index_aval() {
        return $this->aval->readAll_aval();
    }
    
   
}
?>