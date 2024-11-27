<?php

include_once 'Model/Place.php';

class PlaceController {
    private $db;
    private $place;

    public function __construct($db) {
        $this->db = $db;
        $this->place = new Place($db);
    }

    // Método para criar um novo lugar
    public function create_place($nome, $categoria, $descricao, $endereco, $numero, $bairro, $cidade, $cep, $telefone, $emailPlace, $horario, $site, $insta, $img, $waze) {
        $this->place->nome = $nome;
        $this->place->categoria = $categoria;
        $this->place->descricao = $descricao;
        $this->place->endereco = $endereco;
        $this->place->numero = $numero;
        $this->place->bairro = $bairro;
        $this->place->cidade = $cidade;
        $this->place->cep = $cep;
        $this->place->telefone = $telefone;
        $this->place->emailPlace = $emailPlace;
        $this->place->horario = $horario;
        $this->place->site = $site;
        $this->place->insta = $insta;
        $this->place->img = $img;
        $this->place->waze = $waze;

        if($this->place->create_place()) {
            return "Local criado.";
        } else {
            return "Não foi possível criar local.";
        }
    }

    // Método para obter detalhes de um lugar pelo ID
    public function readOne_place($idPlace) {
        $this->place->idPlace = $idPlace;
        $this->place->readOne_place();

        if($this->place->nome != null) {
            // Cria um array associativo com os detalhes do lugar
            $place_arr = array(
                "idPlace" => $this->place->idPlace,
                "nome" => $this->place->nome,
                "categoria" => $this->place->categoria,
                "descricao" => $this->place->descricao,
                "endereco" => $this->place->endereco,
                "numero" => $this->place->numero,
                "bairro" => $this->place->bairro,
                "cidade" => $this->place->cidade,
                "cep" => $this->place->cep,
                "telefone" => $this->place->telefone,
                "emailPlace" => $this->place->emailPlace,
                "horarios" => $this->place->horarios,
                "site" => $this->place->site,
                "insta" => $this->place->insta,
                "img" => $this->place->img,
                "waze" => $this->place->waze
            );
            return $place_arr;
        } else {
            return "Local não localizado.";
        }
    }

    // Método para atualizar os dados de um lugar
    public function update_place($id, $name, $email) {
        $this->place->id = $id;
        $this->place->name = $name;
        $this->place->email = $email;

        if($this->place->update_place()) {
            return "lugar atualizado.";
        } else {
            return "Não foi possível atualizar o lugar.";
        }
    }

    // Método para excluir um lugar pelo ID
    public function delete_place($idPlace) {
        $this->place->idPlace = $idPlace;

        if($this->place->delete_place()) {
            return "lugar foi excluído.";
        } else {
            return "Nao foi possível excluir lugar.";
        }
    }

    // Método para listar todos os lugares
    public function index_place() {
        return $this->place->readAll_place();
    }
    
}
?>