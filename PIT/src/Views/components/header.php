<style>
nav {
    margin-bottom: 50px;
}

#navbar {
    position: fixed;
    z-index: 1000;
    width: 100%;
}
</style>
<?php 
    if(!isset($_SESSION['idUser'])) {
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?action=home">BH Points</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?action=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=sobre">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=pfav">Favoritos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=login">Login / Create account</a>
                </li>
            </ul>
            <label class="switch">
                <input id="tema" type="checkbox">
                <span class="slider"></span>
            </label>
            <form class="d-flex" role="search" action="index.php?action=painel">
                <input name="busca" value="" placeholder="Digite o nome do local" type="text" class="form-control me-2">
                <button type="submit" class="btn btn-outline-success">Pesquisar</button>
            </form>
        </div>
    </div>
</nav>
<?php
    } else { 
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?action=painel">BH Points</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?action=painel">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=sobre-protected">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=pfav">Favoritos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=profile">Bem vindo
                        <?php echo $_SESSION['name']?></a>
                </li>
            </ul>
            <label class="switch">
                <input id="tema" type="checkbox">
                <span class="slider"></span>
            </label>
            <!-- <form class="d-flex" role="search" action="index.php?action=painel&busca=<?php echo $busca;?>">
                <input for="busca" name="busca" value="<?php echo $busca;?>" placeholder="Digite o nome do local"
                    type="text" class="form-control me-2">
                <!-- <a href="index.php?action=painel&busca=<?php echo $busca;?>">Pesquisar</a>
            <button type="submit" class="btn btn-outline-success">Pesquisar</button>
            </form> -->
            <form id="search-form" class="d-flex" role="search" action="index.php">
                <input name="busca" value="" placeholder="Digite o nome do local" type="text" class="form-control me-2">
                <button type="submit" class="btn btn-outline-success">Pesquisar</button>
            </form>
        </div>
    </div>
</nav>

<?php
}
?>