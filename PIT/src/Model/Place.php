<?php

class Place {
    private $conn;
    public $table_name = "places";

    public $busca;
    public $idPlace;
    public $nome;
    public $categoria;
    public $descricao;
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $cep;
    public $telefone;
    public $emailPlace;
    public $horarios;
    public $site;
    public $insta;
    public $img;
    public $waze;

    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Read - Obter detalhes de um lugar pelo ID
    public function readOne_place() {
        $query = "SELECT idPlace, nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace, horarios, site, insta, img, waze FROM " . $this->table_name . " WHERE idPlace = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idPlace);
        $stmt->execute();
 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->idPlace = $row['idPlace'];
        $this->nome = $row['nome'];
        $this->categoria = $row['categoria'];
        $this->descricao = $row['descricao'];
        $this->endereco = $row['endereco'];
        $this->numero = $row['numero'];
        $this->bairro = $row['bairro'];
        $this->cidade = $row['cidade'];
        $this->cep = $row['cep'];
        $this->telefone = $row['telefone'];
        $this->emailPlace = $row['emailPlace'];
        $this->horarios = json_decode($row['horarios'], true);
        $this->site = $row['site'];
        $this->insta = $row['insta'];
        $this->img = $row['img'];
        $this->waze = $row['waze'];
        
    }

    // Método para listar todos os lugares
    public function readAll_place() {
        $query = "SELECT idPlace, nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace, horarios, site, insta, img, waze, round(avg(nota), 1) as nota FROM " . $this->table_name . " left join avaliacoes on(idPlace = fk_idPlace) GROUP BY 
        idPlace";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $places = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $places;
    }

    // Método para listar somente os lugares filtrados por nome
    public function readSearch($busca) {
        $query = "SELECT idPlace, nome, categoria, descricao, endereco, numero, bairro, cidade, cep, telefone, emailPlace, horarios, site, insta, img, waze, round(avg(nota), 1) as nota FROM " . $this->table_name . " left join avaliacoes on(idPlace = fk_idPlace) WHERE nome like :busca GROUP BY 
        idPlace";
        $stmt = $this->conn->prepare($query);
        $busca = "%$busca%";  
        $stmt->bindParam(':busca', $busca);  
        $stmt->execute();
        $places = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $places;
    }
}
?>