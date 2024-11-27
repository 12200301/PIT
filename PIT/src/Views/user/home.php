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

    .busca {
        grid-column: 1 / 3;
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
    <div class="container-fluid" style="height: 1000px">
        <div id="map">
            <gmpx-api-loader key="AIzaSyCHD4wW2cRkm8DYYIFzp6PNcW3-UI6HJW0"
                solution-channel="GMP_GE_mapsandplacesautocomplete_v1">
            </gmpx-api-loader>
            <gmp-map center="-19.919065043645404, -43.938633023313436" zoom="13" map-id="DEMO_MAP_ID">
                <div slot="control-block-start-inline-start" class="place-picker-container">
                    <gmpx-place-picker placeholder="Enter an address"></gmpx-place-picker>
                </div>
                <gmp-advanced-marker></gmp-advanced-marker>
            </gmp-map>
            <h6>
                <a href="index.php?action=newplace" class="text-decoration-none">Deseja incluir seu estabelecimento em
                    nosso site?
                    Clique Aqui!</a>
            </h6>
        </div>
        <div class="right">
            <div class="header-busca">
                <h1>Pontos Turísticos</h1>
                <!-- <form action="">
                    <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>"
                        placeholder="Digite o nome do local" type="text" class="input-form-login">
                    <button type="submit" class="button-confirm">Pesquisar</button>
                </form> -->
            </div>
            <div class="container" style=" display: grid;
            grid-template-columns: 300px 300px 300px 300px;
            grid-template-rows: 475px 475px;
            grid-column-gap: 150px;
            grid-row-gap: 50px;
            margin: 0">
                <?php 
        if (!isset($_GET['busca'])) {
                include_once 'Controller/PlaceController.php';
                include_once '../database/database.php';
                $database = new Database();
                $db = $database->getConnection();
                $placeController = new PlaceController($db);
                $places = $placeController->index_place();
                foreach ($places as $place):
                ?>
                <div class="container" id="places" style="height:440px">
                    <img src="<?php echo $place['img']?>" class="img-fluid" alt="erro" style="width:450px;height:300px">
                    <div id="title">
                        <h4><a style="text-decoration:none"
                                href="index.php?action=read-place&idPlace=<?php echo $place['idPlace']; ?>"><?php echo $place['nome']?></a>
                        </h4>
                        <form action=" index.php?action=<?php echo $place['idPlace']?>" method="post">
                            <button class="btn btn-secondary btn-sm" name="btn-favoritar">Favoritar</button>
                        </form>
                    </div>

                    <div class="container" id="info-places" style="display:flex;justify-content:center">
                        <div class="endereco">
                            <span><?php echo $place['endereco'], ", ", $place['numero'], ", " ,$place['bairro']?> <br>
                                <?php echo $place['cidade'], " - ", $place['cep']?> <br> <a
                                    href="https://api.whatsapp.com/send/?text=https%3A%2F%2Fyoutu.be%2FnWsBRXn-Qh0%3Fsi%3DzfmNEdsSNBbQeliF&type=custom_url&app_absent=0"
                                    id="share">Compartilhar</a> Nota:
                                <?php echo isset($place['nota']) ? $place['nota'] : 'Sem nota'; ?>/5 </span>
                        </div>
                        <div class="contato-place">
                            <span class="telefone">Telefone: <?php echo $place['telefone']?></span> <br>
                            <span>E-mail: <br><?php echo $place['emailPlace']?></span>
                        </div>
                    </div>
                </div>
                <?php
           endforeach;  
        } else {
            
        include_once 'Controller/PlaceController.php';
        include_once '../database/database.php';
        $database = new Database();
        $db = $database->getConnection();
        $placeController = new PlaceController($db);
        $busca = $_GET['busca'];    
        $places = $placeController->readSearch($busca);
        foreach ($places as $place):
                ?>
                <div class="container" id="places" style="height:440px">
                    <img src="<?php echo $place['img']?>" class="img-fluid" alt="erro" style="width:450px;height:300px">
                    <div id="title">
                        <h4><a style="text-decoration:none"
                                href="index.php?action=read-place-protect&idPlace=<?php echo $place['idPlace']; ?>"><?php echo $place['nome']?></a>
                        </h4>
                        <form action=" index.php?action=<?php echo $place['idPlace']?>" method="post">
                            <button class="btn btn-secondary btn-sm" name="btn-favoritar">Favoritar</button>
                        </form>
                    </div>

                    <div class="container" id="info-places" style="display:flex;justify-content:center">
                        <div class="endereco">
                            <span><?php echo $place['endereco'], ", ", $place['numero'], ", " ,$place['bairro']?> <br>
                                <?php echo $place['cidade'], " - ", $place['cep']?> <br> <a
                                    href="https://api.whatsapp.com/send/?text=https%3A%2F%2Fyoutu.be%2FnWsBRXn-Qh0%3Fsi%3DzfmNEdsSNBbQeliF&type=custom_url&app_absent=0"
                                    id="share">Compartilhar</a> Nota:
                                <?php echo isset($place['nota']) ? $place['nota'] : 'Sem nota'; ?>/5 </span>
                        </div>
                        <div class="contato-place">
                            <span class="telefone">Telefone: <?php echo $place['telefone']?></span> <br>
                            <span>E-mail: <br><?php echo $place['emailPlace']?></span>
                        </div>
                    </div>
                </div>
                <?php
              endforeach;
              }
             
      ?>
            </div>
        </div>
    </div>
    <script src=" javascript.js"></script>
</body>

</html>