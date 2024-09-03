<?php
require_once './app/controllers/AgendamentosController.php';
require_once './app/controllers/SecretariasController.php';
require_once './app/controllers/ServicosController.php';
require_once './app/controllers/LoginController.php';
require_once './app/controllers/HomeController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'agendamentos':
        $controller = new AgendamentosController();
        break;
    case 'secretarias':
        $controller = new SecretariasController();
        break;
    case 'servicos':
        $controller = new ServicosController();
        break;
    case 'login':
        $controller = new LoginController();
        break;
    case 'home':
        $controller = new HomeController();
        break;
    default:
        $controller = new HomeController();
        break;
}

$controller->{$action}();
?>