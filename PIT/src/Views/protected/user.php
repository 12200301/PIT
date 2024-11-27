<?php
    include('views/protected/protect.php');
    include('../database/conexao.php');
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
    <style>
    /* Reset básico */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    /* Estilização do container */
    #profile-container {
        max-width: 600px;
        margin: 50px auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    /* Header do perfil */
    .profile-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-header img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 2px solid #ddd;
        margin-bottom: 10px;
    }

    .profile-header h2 {
        margin: 10px 0 5px;
    }

    .profile-header p {
        font-size: 0.9em;
    }

    /* Formulário de edição */
    .profile-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .profile-form label {
        font-size: 0.9em;
        margin-bottom: 5px;
    }

    .profile-form input,
    .profile-form textarea {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1em;
        width: 100%;
    }

    .profile-form textarea {
        resize: none;
        height: 80px;
    }

    /* Botão de salvar */
    .profile-form button {
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s;
    }

    .profile-form button:hover {
        background-color: #45a049;
    }

    #logout {
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s;
        text-align: center;
    }
    </style>
</head>

<body data-bs-theme="dark">
    <?php include('views/components/header.php'); ?>
    <div class="all">
        <div class="card" id="profile-container">
            <div class="profile-header">
                <h2> <?php echo $_SESSION['name']?></h2>
                <p><?php echo $user['email']?></p>
            </div>
            <form action="index.php?action=update-user&idUser=<?php echo $_SESSION['idUser']?>" class="profile-form"
                method="post">
                <label for="name">Nome</label>
                <input type="text" id="name" class="form-control" name="name" value="<?php echo $user['name']?>">

                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="<?php echo $user['email']?>">

                <label for="senha">Senha</label>
                <input type="text" id="senha" class="form-control" name="senha" value="<?php echo $user['senha']?>">

                <button type="submit">Salvar Alterações</button>
                <a id="logout" href=" index.php?action=logout" style="text-decoration:none">Logout</a>
            </form>
        </div>
    </div>
    <script src="javascript.js"></script>
</body>

</html>