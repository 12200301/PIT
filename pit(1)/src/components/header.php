<?php 
    if(!isset($_SESSION)) {
?>
<header>
    <div class="div_principal">
        <div id="nome">
            <a href="home.php">BH Explorer</a>
        </div>
        <div id="central">
            <a href="C:\wamp64\www\projects\pit(1)\src\pages\user\home.php">Home</a>
            <a href="C:\wamp64\www\projects\pit(1)\src\pages\user\sobre.php">Sobre</a>
        </div>
        <div id="cadastro">
            <a href="C:\wamp64\www\projects\pit(1)\src\pages\adm\pfav.php"><span>Favoritos</span></a>
            <a href="C:\wamp64\www\projects\pit(1)\src\login\login.php"><span>Logar / Criar conta</span></a>
            <label class="switch">
                <input id="tema" type="checkbox">
                <span class="slider"></span>
            </label>
        </div>
    </div>
</header>
<?php
    } else { 
?>
<header>
    <div class="div_principal">
        <div id="nome">
            <a href="C:\wamp64\www\projects\pit(1)\src\pages\adm\painel.php">BH Explorer</a>
        </div>
        <div id="central">
            <a href="C:\wamp64\www\projects\pit(1)\src\pages\adm\painel.php">Home</a>
            <a href="C:\wamp64\www\projects\pit(1)\src\pages\adm\sobre.php">Sobre</a>
        </div>
        <div id="cadastro">
            <a href="C:\wamp64\www\projects\pit(1)\src\pages\adm\pfav.php"><span>Favoritos</span></a>
            <a class="nome_usuario" href="C:\wamp64\www\projects\pit(1)\src\login\logout.php">Bem vindo
                <?php echo $_SESSION['name']?></a>
            <label class="switch">
                <input id="tema" type="checkbox">
                <span class="slider"></span>
            </label>
        </div>
    </div>
</header>
<?php
}
?>