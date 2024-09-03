<?php
require_once 'config/database.php';
require_once 'app/models/Secretaria.php';

class SecretariasController {
    private $db;
    private $secretaria;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=login&action=index');
            exit();
        }
        $database = new Database();
        $this->db = $database->connect();
        $this->secretaria = new Secretaria($this->db);
    }

    public function index() {
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
        $query = "SELECT secretarias.* FROM secretarias ";

        if (!empty($searchTerm)) {
            $query .= " WHERE secretarias.nome_secretaria LIKE :searchTerm
                        OR secretarias.login LIKE :searchTerm";
        }

        $stmt = $this->db->prepare($query);
        if (!empty($searchTerm)) {
            $searchTerm = "%{$searchTerm}%";
            $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
        }
        $stmt->execute();
        $result = $stmt;
        include 'app/views/secretarias/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->secretaria->nome_secretaria = $_POST['nome_secretaria'];
            $this->secretaria->login = $_POST['login'];
            $this->secretaria->senha = $_POST['senha'];
            $this->secretaria->create();
            header('Location: index.php?controller=secretarias&action=index');
        } else {
            include 'app/views/secretarias/create.php';
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->secretaria->id = $_POST['id'];
            $this->secretaria->nome_secretaria = $_POST['nome_secretaria'];
            $this->secretaria->login = $_POST['login'];
            $this->secretaria->senha = $_POST['senha'];
            $this->secretaria->update();
            header('Location: index.php?controller=secretarias&action=index');
      
        } else {
            $this->secretaria->id = $_GET['id'];
            $result = $this->secretaria->read();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            include 'app/views/secretarias/edit.php';
        }
    }
    public function delete() {
        $this->secretaria->id = $_GET['id'];
        $this->secretaria->delete();
        header('Location: index.php?controller=secretarias&action=index');
    }
}
?>