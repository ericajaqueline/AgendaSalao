<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    //private $port = "3306";
    private $dbname ="bancoagendasalaoo";
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

 function update($id, $nome_cliente, $telefone_cliente, $data_agendamento, $horario_agendamento, $id_servico) {
    $stmt = $this->db->prepare("UPDATE agendamentos SET 
        nome_cliente = :nome_cliente, 
        telefone_cliente = :telefone_cliente, 
        data_agendamento = :data_agendamento, 
        horario_agendamento = :horario_agendamento, 
        id_servico = :id_servico 
        WHERE id = :id");
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome_cliente', $nome_cliente);
    $stmt->bindParam(':telefone_cliente', $telefone_cliente);
    $stmt->bindParam(':data_agendamento', $data_agendamento);
    $stmt->bindParam(':horario_agendamento', $horario_agendamento);
    $stmt->bindParam(':id_servico', $id_servico);

    return $stmt->execute();
}

?>
