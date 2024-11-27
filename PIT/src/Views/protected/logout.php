<!-- Ação para o usuário sair do login -->
<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

    header ("Location: index.php?action=home");
?>