<style>
.right {
    display: grid;
    grid-template-columns: 500px 500px;
    grid-template-rows: 100px 400px 400px;
    grid-column-gap: 150px;
    grid-row-gap: 50px;
}

.header-busca {
    height: 100px;
    width: 1000px;
    display: flex;
    flex-direction: column;
    align-items: center;
    grid-column-start: 1;
    grid-column-end: 3;
}

.header-busca form input {
    width: 500px;
}

.input-form-login {
    width: 250px;
    height: 26px;
    border-radius: 5px;
    border: 2px solid var(--main-color);
    background-color: var(--bg-color);
    box-shadow: 4px 4px var(--main-color);
    font-size: 15px;
    font-weight: 600;
    color: var(--font-color);
    padding: 5px 10px;
    outline: none;
}

.input-form-login::placeholder {
    color: var(--font-color-sub);
    opacity: 0.8;
}

.input-form-login:focus {
    border: 2px solid var(--input-focus);
}

.button-confirm:active {
    box-shadow: 0px 0px var(--main-color);
    transform: translate(3px, 3px);
}

.button-confirm {
    width: 120px;
    height: 40px;
    border-radius: 5px;
    border: 2px solid var(--main-color);
    background-color: var(--bg-color);
    box-shadow: 4px 4px var(--main-color);
    font-size: 17px;
    font-weight: 600;
    color: var(--font-color);
    cursor: pointer;
}

.place {
    width: 500px;
    border: solid;
    height: 400px;
    margin-bottom: 40px;
    display: flex;
    background-color: white;
    flex-direction: column;
}

.info-places {
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    margin-top: 10px;
}

#title {
    display: flex;
    justify-content: center;
}

.info-places span {
    font-size: 14px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.info-places h3 {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.contato-place {
    display: flex;
    width: min-content;
    flex-direction: column;
}
</style>

<div class="right">
    <div class="header-busca">
        <h1>Pontos Turísticos</h1>
        <form action="">
            <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>"
                placeholder="Digite o nome do local" type="text" class="input-form-login">
            <button type="submit" class="button-confirm">Pesquisar</button>
        </form>
    </div>
    <?php 
        if (!isset($_GET['busca'])) {
            $sql_code = "select idPlace, nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from places";
            $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar");
            while($dados = $sql_query->fetch_assoc()) { 
                ?>
    <div class="place">
        <img src="<?php echo $dados['img']?>" alt="erro">
        <h3 id="title"><a href="..\mercado.php"><?php echo $dados['nome']?></a>
            <form action="..\login\index2.php?action=<?php echo $dados['idPlace']?>" method="post">
                <button name="btn-favoritar">Favoritar</button>
            </form>
        </h3>
        <div class="info-places">
            <div class="endereco">
                <span><?php echo $dados['endereco'], ", ", $dados['numero'], ", " ,$dados['bairro']?> <br>
                    <?php echo $dados['cidade'], " - ", $dados['cep']?> <br> <a
                        href=" https://api.whatsapp.com/send?text=">Compartilhar</a></span>
            </div>
            <div class=" contato-place">
                <span class="telefone">Telefone: <?php echo $dados['telefone']?></span>
                <span>E-mail: <br><?php echo $dados['emailPlace']?></span>
            </div>
        </div>
    </div>
    <?php
            }
        } else {
          $pesquisa = $mysqli->real_escape_string($_GET['busca']);
          $sql_code = "select idPlace, nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from places where nome like '%$pesquisa%'";
          $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar");

          if ($sql_query->num_rows == 0) {
            echo "Nenhum resultado encontrado";
            echo $_GET['busca'];
          } else {
            
              while($dados = $sql_query->fetch_assoc()) {
                ?>
    <div class="place">
        <img src="<?php echo $dados['img']?>" alt="erro">
        <h3 id="title"><a href="..\mercado.php"><?php echo $dados['nome']?></a>
            <form action="..\login\index2.php?action=1<?php echo $dados['idPlace']?>" method="post"><button
                    name="btn-favoritar">Favoritar</button></form>
        </h3>
        <div class="info-places">
            <div class="endereco">
                <span><?php echo $dados['endereco'], ", ", $dados['numero'], ", " ,$dados['bairro']?> <br>
                    <?php echo $dados['cidade'], " - ", $dados['cep']?> <br> <a
                        href="https://api.whatsapp.com/send?text=">Compartilhar</a></span>
            </div>
            <div class="contato-place">
                <span>Telefone: <?php echo $dados['telefone']?></span>
                <span>E-mail: <?php echo $dados['emailPlace']?></span>
            </div>
        </div>
    </div>
    <?php
              
              }
          }
        }
      ?>
</div>