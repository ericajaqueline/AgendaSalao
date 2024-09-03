<?php
require_once 'config/database.php';
require_once 'app/models/Agendamento.php';
require_once 'app/models/Servico.php';
require_once 'app/models/Secretaria.php';

class AgendamentosController {
    private $db;
    private $agendamento;
    private $servico;
    private $secretaria;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->agendamento = new Agendamento($this->db);
        $this->servico = new Servico($this->db);
        $this->secretaria = new Secretaria($this->db);
    }

    public function index() {
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
        $query = "SELECT agendamentos.*, servicos.nome_servico, secretarias.login AS nome_secretaria 
                  FROM agendamentos 
                  JOIN servicos ON agendamentos.id_servico = servicos.id
                  JOIN secretarias ON agendamentos.id_secretaria = secretarias.id";
        if (!empty($searchTerm)) {
            $query .= " WHERE agendamentos.nome_cliente LIKE :searchTerm
                        OR agendamentos.telefone_cliente LIKE :searchTerm
                        OR agendamentos.data_agendamento LIKE :searchTerm
                        OR agendamentos.horario_agendamento LIKE :searchTerm";
        }
        $stmt = $this->db->prepare($query);
        if (!empty($searchTerm)) {
            $searchTerm = "%{$searchTerm}%";
            $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
        }
        $stmt->execute();
        $result = $stmt;
        include 'app/views/agendamentos/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->agendamento->nome_cliente = $_POST['nome_cliente'];
            $this->agendamento->telefone_cliente = $_POST['telefone_cliente'];
            $this->agendamento->data_agendamento = $_POST['data_agendamento'];
            $this->agendamento->horario_agendamento = $_POST['horario_agendamento'];
            $this->agendamento->id_servico = $_POST['id_servico'];
            $this->agendamento->id_secretaria = $_POST['id_secretaria'];
            $this->agendamento->create();
            header('Location: index.php?controller=agendamentos&action=index');
        } else {
            $resultServicos = $this->servico->read();
            $servicos = $resultServicos->fetchAll(PDO::FETCH_ASSOC);

            $resultSecretarias = $this->secretaria->read();
            $secretarias = $resultSecretarias->fetchAll(PDO::FETCH_ASSOC);

            include 'app/views/agendamentos/create.php';
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->agendamento->id = $_POST['id'];
            $this->agendamento->nome_cliente = $_POST['nome_cliente'];
            $this->agendamento->telefone_cliente = $_POST['telefone_cliente'];
            $this->agendamento->data_agendamento = $_POST['data_agendamento'];
            $this->agendamento->horario_agendamento = $_POST['horario_agendamento'];
            $this->agendamento->id_servico = $_POST['id_servico'];
            $this->agendamento->id_secretaria = $_POST['id_secretaria'];
            $this->agendamento->update();
            header('Location: index.php?controller=agendamentos&action=index');
        } else {
            $this->agendamento->id = $_GET['id'];
            $sql = "SELECT agendamentos.*, servicos.nome_servico, secretarias.login AS nome_secretaria 
                    FROM agendamentos 
                    JOIN servicos ON agendamentos.id_servico = servicos.id 
                    JOIN secretarias ON agendamentos.id_secretaria = secretarias.id 
                    WHERE agendamentos.id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $this->agendamento->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $resultServicos = $this->servico->read();
            $servicos = $resultServicos->fetchAll(PDO::FETCH_ASSOC);

            $resultSecretarias = $this->secretaria->read();
            $secretarias = $resultSecretarias->fetchAll(PDO::FETCH_ASSOC);

            include 'app/views/agendamentos/edit.php';
        }
    }

    public function delete() {
        $this->agendamento->id = $_GET['id'];
        if ($this->agendamento->delete()) {
            header('Location: index.php?controller=agendamentos&action=index');
        } else {
            echo "Erro ao deletar agendamento.";
        }
    }
}
?>