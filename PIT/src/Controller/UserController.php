<?php

include_once 'Model/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new User($db);
    }

    // Método para criar um novo usuário
    public function create_user($name, $email, $senha) {
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if($this->user->create_user()) {
            return "Usuário criado.";
        } else {
            return "Não foi possível criar usuário.";
        }
    }

    // Método para obter detalhes de um usuário pelo ID
    public function readOne_user($idUser) {
        $this->user->idUser = $idUser;
        $this->user->readOne_user();

        if($this->user->name != null) {
            // Cria um array associativo com os detalhes do usuário
            $user_arr = array(
                "idUser" => $this->user->idUser,
                "name" => $this->user->name,
                "email" => $this->user->email,
                "senha" => $this->user->senha 
            );
            return $user_arr;
        } else {
            return "Usuário não localizado.";
        }
    }

    // Método para atualizar os dados de um usuário
    public function update_user($idUser, $name, $email, $senha) {
        $this->user->idUser = $idUser;
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if($this->user->update_user()) {
            return "Usuário atualizado.";
        } else {
            return "Não foi possível atualizar o usuário.";
        }
    }

    // Método para excluir um usuário pelo ID
    public function delete_user($idUser) {
        $this->user->idUser = $idUser;

        if($this->user->delete_user()) {
            return "Usuário foi excluído.";
        } else {
            return "Nao foi possível excluir usuário.";
        }
    }

    // Método para listar todos os usuários
    public function index_user() {
        return $this->user->readAll_user();
    }
    
}
?>