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
    #container-create {
        width: 100%;
        height: 750px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>

<body data-bs-theme="dark">
    <?php include('views/components/header.php'); ?>
    <div class="all">
        <div class="container" id="container-create">
            <form class="card" action="index.php?action=create-user" id="form-create" method="post"
                style="width: 400px">
                <div class="title-form-login">
                    <h3>Bem vindo,</h3>
                    <h6>insira seus dados para continuar</h6>
                </div>
                <div class="input-group mb-3" style="width: 90%;align-self:center">
                    <input type="text" class="form-control" name="name" placeholder="Nome" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3" style="width: 90%;align-self:center">
                    <input type="e-mail" class="form-control" name="email" placeholder="Email" aria-label="Email"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3" style="width: 90%;align-self:center">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" aria-label="Senha"
                        aria-describedby="basic-addon1">
                </div>
                <button class="btn btn-success" type="submit">Confirmar</button>
            </form>
        </div>
    </div>




    <!-- <div class="container-create">
        <form action="index.php?action=create-user" class="form-create" method="post">
            <div class="title-form-create">Bem Vindo,<br>
                <span>insira seus dados para continuar</span>
            </div>
            <input type="text" placeholder="Nome" name="name" class="input-form-create" required>
            <input type="email" placeholder="Email" name="email" class="input-form-create" required>
            <input type="password" placeholder="Senha" name="senha" class="input-form-create" required>
            <div class="create-with"></div>
            <button class="button-confirm" type="submit">Confirmar</button>
        </form>
    </div> -->
    <script src="javascript.js"></script>
</body>

</html>