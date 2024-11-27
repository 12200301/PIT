<!-- Ação para proteger páginas que somente usuários com login podem acessar -->
<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<?php
    if(!isset($_SESSION['idUser'])) {
        die(include("desloged.php"));
}
?>