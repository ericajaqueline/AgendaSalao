<?php
class Secretaria {
    private $conn;
    private $table = 'secretarias';

    public $id;
    public $nome_secretaria;
   
    public $login;
    public $senha;

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
        $query = "INSERT INTO " . $this->table . " SET nome_secretaria=:nome_secretaria, login=:login, senha=:senha";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_secretaria', $this->nome_secretaria);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':senha', $this->senha);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET nome_secretaria=:nome_secretaria, login=:login, senha=:senha WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_secretaria', $this->nome_secretaria);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }
}
?>