<!-- <div class="container" style=" display: grid;
            grid-template-columns: 300px 300px 300px 300px;
            grid-template-rows: 475px 475px;
            grid-column-gap: 150px;
            grid-row-gap: 50px;
            margin: 0">
    <?php 
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
                        href=" https://api.whatsapp.com/send?text=" id="share">Compartilhar</a> Nota:
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
            ?>
</div> -->

<div class="right">
    <div class="header-busca">
        <h1>Pontos Turísticos</h1>
        <form action="">
            <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>"
                placeholder="Digite o nome do local" type="text" class="input-form-login">
            <button type="submit" class="button-confirm">Pesquisar</button>
        </form>
    </div>
    <div class="container" style=" display: grid;
            grid-template-columns: 300px 300px 300px 300px;
            grid-template-rows: 475px 475px;
            grid-column-gap: 150px;
            grid-row-gap: 50px;
            margin: 0">
        <?php 
        // Verifica se existe alguma busca feita
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
                            href=" https://api.whatsapp.com/send?text=" id="share">Compartilhar</a> Nota:
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
        // Caso exista alguma busca, é criado uma variável para conter o filtro que vai ser usado na consulta ao banco de dados
        include_once 'Controller/PlaceController.php';
        include_once '../database/database.php';
        $database = new Database();
        $db = $database->getConnection();
        $placeController = new PlaceController($db);
        $pesquisa = $_GET['busca'];    
        $places = $placeController->readSearch($pesquisa);
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
                            href=" https://api.whatsapp.com/send?text=" id="share">Compartilhar</a> Nota:
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