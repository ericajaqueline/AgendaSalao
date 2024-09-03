<?php
require_once 'config/database.php';
require_once 'app/models/Servico.php';

class ServicosController {
    private $db;
    private $servico;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=login&action=index');
            exit();
        }
        $database = new Database();
        $this->db = $database->connect();
        $this->servico = new Servico($this->db);
    }

    public function index() {
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : ''; $query = "SELECT * FROM servicos"; 
        if (!empty($searchTerm)) {
            $query .= " WHERE nome_servico LIKE :searchTerm
                OR descricao LIKE :searchTerm
                OR preco LIKE :searchTerm";
            }
            $stmt = $this->db->prepare($query);
            if (!empty($searchTerm)) {
            $searchTerm = "%{$searchTerm}%";
            $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
        }
        $stmt->execute();
        $result = $stmt;
        include 'app/views/servicos/index.php';  
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->servico->nome_servico = $_POST['nome_servico'];
            $this->servico->descricao = $_POST['descricao'];
            $this->servico->preco = $_POST['preco'];
            $this->servico->create();
            header('Location: index.php?controller=servicos&action=index');
        } else {
            include 'app/views/servicos/create.php';
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->servico->id = $_POST['id'];
            $this->servico->nome_servico = $_POST['nome_servico'];
            $this->servico->descricao = $_POST['descricao'];
            $this->servico->preco = $_POST['preco'];
            $this->servico->update();
            header('Location: index.php?controller=servicos&action=index');
        } else {
            $this->servico->id = $_GET['id'];
            $result = $this->servico->read();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            include 'app/views/servicos/edit.php';
        }
    }

    public function delete() {
    
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = intval($_GET['id']); 
            
            $this->servico->id = $id;
    
            try {
                
                if ($this->servico->delete()) {
                    
                    header('Location: index.php?controller=servicos&action=index');
                    exit; 
                } else {
                   
                    $errorMessage = 'Erro:Não é possível deletar serviço com agendamento.';
                    header('Location: index.php?controller=servicos&action=index&error=' . urlencode($errorMessage));
                    exit; 
                }
            } catch (PDOException $e) {
               
                $errorMessage = 'Erro:Não é possível deletar serviço com agendamento.';
                header('Location: index.php?controller=servicos&action=index&error=' . urlencode($errorMessage));
                exit; 
            } catch (Exception $e) {
               
                $errorMessage = 'Erro:Não é possível deletar serviço com agendamento.';
                header('Location: index.php?controller=servicos&action=index&error=' . urlencode($errorMessage));
                exit; 
            }
        } else {
            
            $errorMessage = 'Erro: ID inválido.';
            header('Location: index.php?controller=servicos&action=index&error=' . urlencode($errorMessage));
            exit; 
        }
    }
    
    
}
?>

