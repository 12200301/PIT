<?php
// Inclusão dos controllers
include_once '../database/database.php';
include_once 'Controller/AvalController.php';
include_once 'Controller/ComentController.php';
include_once 'Controller/FavController.php';
include_once 'Controller/PlaceController.php';
include_once 'Controller/UserController.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);
$placeController = new PlaceController($db);
$comentController = new ComentController($db);
$favController = new FavController($db);
$avalController = new AvalController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : null;
$idPlace = isset($_GET['idPlace']) ? $_GET['idPlace'] : null;
$fk_idPlace = isset($_GET['idPlace']) ? $_GET['idPlace'] : null;



// Determinar a ação do usuário
switch ($action) {
    case 'create':
            include('views/user/create.php');
        break;

    case 'home':
            include('views/user/home.php');
        break;

    case 'login':
            include('views/user/login.php');
        break;

    case 'newplace':
            include('views/user/newplace.php');
        break;

    case 'places':
            include('views/user/places.php');
        break;

    case 'sobre':
            include('views/user/sobre.php');
        break;

    case 'logout':
            include('views/protected/protect.php');
            include('views/protected/logout.php');
        break;

    case 'painel': 
            include('views/protected/protect.php');
            include('views/protected/painel.php');
        break;
        
    case 'pfav':
            $favController = new FavController($db);
            $favs = $favController->index_fav();
            include('views/protected/protect.php');
            include('views/protected/pfav.php');
        break;
    
    case 'places-protected':
            include('views/protected/protect.php');
            include('views/protected/places-protected.php');
        break;
    
    case 'sobre-protected':
            include('views/protected/protect.php');
            include('views/protected/sobre-protected.php');
        break;

    case 'profile':
        include('views/protected/protect.php');
        if ($_SESSION['idUser']) {
            $idUser = $_SESSION['idUser'];
            $user = $userController->readOne_user($idUser);
        }
            include('views/protected/user.php');
        break;
        
    case 'create-user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $message = $userController->create_user($name, $email, $senha);
            echo $message;
            header("Location: index.php?action=login");
        } else {
            include 'create.php';
        }
        break;

    case 'update-user': 
        include('views/protected/protect.php');
        if ($idUser) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $idUser = $_SESSION['idUser'];
                $_SESSION['name'] = $name;
                $message = $userController->update_user($idUser, $name, $email, $senha);
                header('Location: index.php?action=profile');
?>
<script>
alert('Usuário atualizado!');
</script>
<?php
            } else {
                $user = $userController->readOne_user($idUser);
                include 'views/protected/user.php';
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'delete-user':
        if ($idUser) {
            $message = $userController->delete_user($idUser);
            echo $message; 
            echo '<a href="index.php">Back to User List</a>';
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'read-place':
                $place = $placeController->readOne_place($fk_idPlace);
                if (is_array($place)) {
                        include 'views/user/places.php';
                } else {      
                    echo $places; // Exibir mensagem de erro
                }
            break;

    case 'read-place-protect':
                $place = $placeController->readOne_place($fk_idPlace);
                if (is_array($place)) {
                        include 'views/protected/places-protected.php';
                } else {      
                    echo $places; // Exibir mensagem de erro
                }
            break;

    case 'add-coment':
            require_once('views/protected/protect.php');
            $coment = $_POST['coment'];
            $fk_idUser = $_SESSION['idUser'];
            $message = $comentController->create_coment($coment, $fk_idUser);
            header('Location: mercado.php');    
       break;

        // criar favorito
    case in_array($action, [1, 2, 3, 4, 5, 6, 7, 8]):
            require_once('views/protected/protect.php');
            $fk_idUser = $_SESSION['idUser'];
            $fk_idPlace = $action; 
            $message = $favController->create_fav($fk_idUser, $fk_idPlace);
            header ('Location: index.php?action=painel');
            ?>
<script>
alert('Favorito adicionado!');
</script>
<?php
            
        break;

    default:
        include('views/user/home.php');
        break;

    }


$delete = isset($_GET['delete']) ? $_GET['delete'] : '';
$fk_idPlace = isset($_GET['fk_idPlace']) ? $_GET['fk_idPlace'] : null;

    switch ($delete) {

        case (1 && 2 && 3 && 4 && 5 && 6):
            $message = $favController->delete_fav($fk_idPlace);
            header('Location: index?action=pfav');
        break;
}

$rate = isset($_GET['rate']) ? $_GET['rate'] : null;
$idPlace = isset($_GET['idPlace']) ? $_GET['idPlace'] : null;
$rating = isset($_GET['rating']) ? $_GET['rating'] : null;
    switch ($rate) {

        case ('rate'):
                require_once('views/protected/protect.php');
                $fk_idUser = $_SESSION['idUser'];
                $nota = $rating;
                $message = $avalController->create_aval($fk_idPlace, $fk_idUser, $nota);
                header("Location: index.php?action=read-place-protect&idPlace=" . $fk_idPlace);
                ?>
<script>
alert('Avaliação registrada!');
</script>
<?php
            break;
}
?>