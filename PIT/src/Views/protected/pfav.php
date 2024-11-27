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
    #title {
        display: flex;
        justify-content: center;
    }

    #places {
        width: 450px;
        height: 440px;
        margin: 0;
        border: solid 2px;
        height: fit-content;
        padding: 0;
    }

    #info-places {
        display: flex;
        font-size: 13px;
    }

    .contato-place {
        margin-left: 15px;
    }

    a {
        color: white;
    }
    </style>
</head>

<body data-bs-theme="dark">
    <?php include('views/components/header.php'); ?>
    <div class="all">
        <h1>FAVORITOS</h1>
        <div class="container" style=" display: grid;
    grid-template-columns: 300px 300px 300px 300px;
    grid-template-rows: 475px 475px;
    grid-column-gap: 150px;
    grid-row-gap: 50px;
    margin: 0">
            <?php  
            foreach ($favs as $fav):
            ?>
            <div class="container" id="places" style="height:440px">
                <img src="<?php echo $fav['img']?>" class="img-fluid" alt="erro" style="width:450px;height:300px">
                <div id="title">
                    <h4><a style="text-decoration:none"
                            href="index.php?action=read-place-protect&idPlace=<?php echo $fav['fk_idPlace']; ?>"><?php echo $fav['nome']?></a>
                    </h4>
                    <form
                        action="index.php?delete=<?php echo $fav['fk_idPlace']?>&fk_idPlace=<?php echo $fav['fk_idPlace']; ?>"
                        method="post">
                        <button class="btn btn-secondary btn-sm">Remover favorito</button>
                    </form>
                </div>

                <div class=" container" id="info-places" style="display:flex;justify-content:center">
                    <div class="endereco">
                        <span><?php echo $fav['endereco'], ", ", $fav['numero'], ", " ,$fav['bairro']?> <br>
                            <?php echo $fav['cidade'], " - ", $fav['cep']?> <br> <a
                                href=" https://api.whatsapp.com/send?text=" id="share">Compartilhar</a> Nota:
                            <?php echo isset($fav['nota']) ? $fav['nota'] : 'Sem nota'; ?>/5 </span>
                    </div>
                    <div class="contato-place">
                        <span class="telefone">Telefone: <?php echo $fav['telefone']?></span> <br>
                        <span>E-mail: <br><?php echo $fav['emailPlace']?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="javascript.js"></script>
</body>

</html>