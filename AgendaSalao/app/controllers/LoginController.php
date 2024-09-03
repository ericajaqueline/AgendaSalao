<?php
require_once 'config/database.php';
require_once 'app/models/Secretaria.php';

class LoginController {
    private $db;
    private $secretaria;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->secretaria = new Secretaria($this->db);
    }

    public function index() {
        include 'app/views/login.php';
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            $query = "SELECT * FROM secretarias WHERE login = :login AND senha = :senha";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                session_start();
                $_SESSION['user'] = $login;
                header('Location: index.php?controller=home&action=index');
            } else {
                echo "Login ou senha inválidos.";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=login&action=index');
    }
}
?>