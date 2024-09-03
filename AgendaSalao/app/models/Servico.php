<?php
class Servico {
    private $conn;
    private $table = 'servicos';

    public $id;
    public $nome_servico;
    public $descricao;
    public $preco;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        
        $query = "SELECT * FROM " . $this->table;

        
        if ($this->id) {
            $query .= " WHERE id = :id";
        }

        $stmt = $this->conn->prepare($query);

        
        if ($this->id) {
        $stmt->bindParam(':id', $this->id);
        }

        $stmt->execute();
        return $stmt;
    }


    public function create() {
        $query = "INSERT INTO " . $this->table . " SET nome_servico=:nome_servico, descricao=:descricao, preco=:preco";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_servico', $this->nome_servico);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET nome_servico=:nome_servico, descricao=:descricao, preco=:preco WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_servico', $this->nome_servico);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
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