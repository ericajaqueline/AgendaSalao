<?php
class Agendamento {
    private $conn;
    private $table = 'agendamentos';
    public $id;
    public $nome_cliente;
    public $telefone_cliente;
    public $data_agendamento;
    public $horario_agendamento;
    public $id_servico;
    public $id_secretaria;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET nome_cliente=:nome_cliente, telefone_cliente=:telefone_cliente, data_agendamento=:data_agendamento, horario_agendamento=:horario_agendamento, id_servico=:id_servico, id_secretaria=:id_secretaria";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_cliente', $this->nome_cliente);
        $stmt->bindParam(':telefone_cliente', $this->telefone_cliente);
        $stmt->bindParam(':data_agendamento', $this->data_agendamento);
        $stmt->bindParam(':horario_agendamento', $this->horario_agendamento);
        $stmt->bindParam(':id_servico', $this->id_servico);
        $stmt->bindParam(':id_secretaria', $this->id_secretaria);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    public function update() {
        $query = "UPDATE " . $this->table . " SET nome_cliente=:nome_cliente, telefone_cliente=:telefone_cliente, data_agendamento=:data_agendamento, horario_agendamento=:horario_agendamento, id_servico=:id_servico WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_cliente', $this->nome_cliente);
        $stmt->bindParam(':telefone_cliente', $this->telefone_cliente);
        $stmt->bindParam(':data_agendamento', $this->data_agendamento);
        $stmt->bindParam(':horario_agendamento', $this->horario_agendamento);
        $stmt->bindParam(':id_servico', $this->id_servico);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>