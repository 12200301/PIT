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
    img {
        width: 600px;
    }

    .main-div {
        display: grid;
        grid-template-columns: 600px 600px;
        grid-template-rows: 400px;
        grid-column-gap: 50px;
    }

    .rating {
        display: inline-block;
    }

    .rating input {
        display: none;
    }

    .rating label {
        float: right;
        cursor: pointer;
        color: #ccc;
        transition: color 0.3s;
    }

    .rating label:before {
        content: '\2605';
        font-size: 30px;
    }

    .rating input:checked~label,
    .rating label:hover,
    .rating label:hover~label {
        color: #e58e09;
        transition: color 0.3s;
    }

    #txt-avalie {
        margin-bottom: 0;
    }
    </style>
</head>

<body data-bs-theme="dark">
    <?php include('views/components/header.php'); ?>
    <div class="main-div">
        <div id="div-img">
            <img src="<?php echo $place['img']?>" alt="erro">
        </div>
        <div id="div-dados">
            <h1><?php echo $place['nome']?></h1>
            <p><?php echo $place['categoria']?></p>
            <div class="endereco">
                <span><?php echo $place['endereco'], ", ", $place['numero'], ", " ,$place['bairro']?> <br>
                    <?php echo $place['cidade'], " - ", $place['cep']?> <br>
                </span>
            </div>
            <div class=" contato-place">
                <span class="telefone">Telefone: <?php echo $place['telefone']?></span> <br>
                <span>E-mail: <br><?php echo $place['emailPlace']?> <br> <a
                        href=" https://api.whatsapp.com/send?text=">Compartilhar</a></span>
            </div>
            <div id="div-texto"><?php echo $place['descricao']?></div>
            <p id="txt-avalie">Avalie esse local!!</p>

            <form action="index.php" method="GET">
                <div class="rating">
                    <input value="5" name="rating" id="star5" type="radio">
                    <label for="star5"></label>
                    <input value="4" name="rating" id="star4" type="radio">
                    <label for="star4"></label>
                    <input value="3" name="rating" id="star3" type="radio">
                    <label for="star3"></label>
                    <input value="2" name="rating" id="star2" type="radio">
                    <label for="star2"></label>
                    <input value="1" name="rating" id="star1" type="radio">
                    <label for="star1"></label>
                </div>
                <input type="hidden" name="fk_idPlace" value="<?php echo $place['idPlace']; ?>">
                <input type="hidden" name="rate" value="rate">
                <button type="submit">Enviar Avaliação</button>
            </form>

        </div>
    </div>
    <script src="javascript.js"></script>
</body>

</html>