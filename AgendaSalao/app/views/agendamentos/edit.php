<?php include 'app/views/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h2 class="text-center my-4">Editar Agendamento</h2>
<div class="container">
    <form method="POST" action="index.php?controller=agendamentos&action=edit">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

        <div class="form-group">
            <label for="nome_cliente">Nome do Cliente:</label>
            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="<?php echo htmlspecialchars($row['nome_cliente']); ?>" required>
        </div>

        <div class="form-group">
            <label for="telefone_cliente">Telefone do Cliente:</label>
            <input type="text" class="form-control" id="telefone_cliente" name="telefone_cliente" value="<?php echo htmlspecialchars($row['telefone_cliente']); ?>">
        </div>

        <div class="form-group">
            <label for="data_agendamento">Data do Agendamento:</label>
            <input type="date" class="form-control" id="data_agendamento" name="data_agendamento" value="<?php echo htmlspecialchars($row['data_agendamento']); ?>" required>
        </div>

        <div class="form-group">
            <label for="horario_agendamento">Horário do Agendamento:</label>
            <input type="time" class="form-control" id="horario_agendamento" name="horario_agendamento" value="<?php echo htmlspecialchars($row['horario_agendamento']); ?>" required>
        </div>

        <div class="form-group">
            <label for="id_servico">Serviço:</label>
            <select class="form-control" id="id_servico" name="id_servico" required>
                <?php foreach ($servicos as $servico): ?>
                    <option value="<?php echo $servico['id']; ?>" <?php echo ($servico['id'] == $row['id_servico']) ? 'selected' : ''; ?>>
                        <?php echo $servico['nome_servico']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_secretaria">Secretaria:</label>
            <select class="form-control" id="id_secretaria" name="id_secretaria" required>
                <?php foreach ($secretarias as $secretaria): ?>
                    <option value="<?php echo $secretaria['id']; ?>" <?php echo ($secretaria['id'] == $row['id_secretaria']) ? 'selected' : ''; ?>>
                        <?php echo $secretaria['login']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="salvar" style="background-color: #7d5b8c; color: white; border: none;">Atualizar</button>
    </form>
</div>

<?php include 'app/views/footer.php'; ?>