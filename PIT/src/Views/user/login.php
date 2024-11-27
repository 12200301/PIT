<?php
include('../database/conexao.php');
// Modo de login do usuário
if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Digite seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Digite sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "select * from usuarios where email = '$email' and senha =  '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
// Criação da sessão de login do usuário
            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['idUser'] = $usuario['idUser'];
            $_SESSION['name'] = $usuario['name'];

            header("Location: index.php?actin=painel");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body data-bs-theme="dark">
    <?php include("views/components/header.php"); ?>
    <div class="container" id="container-login">
        <form class="card" id="form-login" method="post" style="width: 400px">
            <div class="title-form-login">
                <h3>Bem vindo,</h3>
                <h6>faça login para continuar</h6>
            </div>
            <div class="input-group mb-3" style="width: 90%;align-self:center">
                <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email"
                    aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3" style="width: 90%;align-self:center">
                <input type="password" class="form-control" name="senha" placeholder="Senha" aria-label="Senha"
                    aria-describedby="basic-addon1">
            </div>
            <span style="display:flex;flex-direction:column;align-items:center;margin-bottom:20px">
                <p>Ainda não possui cadastro?</p>
                <a href="index.php?action=create">Clique Aqui</a>
            </span>
            <button class="btn btn-success" type="submit">Confirmar</button>
        </form>
    </div>
    <script src="javascript.js"></script>
</body>

</html>