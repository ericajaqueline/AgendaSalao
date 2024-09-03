<?php include 'app/views/header.php'; ?>

<div class="row justify-content-center">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-mt-4">
    <h2 class="mb-3">Listar Agendamentos</h2>

    <div class="mb-3">
        <button type="submit" class="btn" style="background-color: #7d5b8c; color: white; border: none;">
            <a href="index.php?controller=agendamentos&action=create" style="color: white;">Cadastrar Agendamento</a>
        </button>
    </div>

    <form method="get" action="index.php" class="mb-4">
        <input type="hidden" name="controller" value="agendamentos">
        <input type="hidden" name="action" value="index">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar..." value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : '', ENT_QUOTES); ?>">
            <div class="input-group-append">
                <button type="submit" class="btn" style="background-color: #7d5b8c; color: white; border: none;">Buscar</button>
            </div>
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="text-align: center;">Nome do Cliente</th>
                <th style="text-align: center;">Telefone do Cliente</th>
                <th style="text-align: center;">Data do Agendamento</th>
                <th style="text-align: center;">Horário do Agendamento</th>
                <th style="text-align: center;">Serviço Agendado</th>
                <th style="text-align: center;">Secretaria responsável</th>
                <th style="text-align: center;">Ações possíveis para realizar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nome_cliente'], ENT_QUOTES); ?></td>
                <td><?php echo htmlspecialchars($row['telefone_cliente'], ENT_QUOTES); ?></td>
                <td><?php echo htmlspecialchars($row['data_agendamento'], ENT_QUOTES); ?></td>
                <td><?php echo htmlspecialchars($row['horario_agendamento'], ENT_QUOTES); ?></td>
                <td><?php echo htmlspecialchars($row['nome_servico'], ENT_QUOTES); ?></td>
                <td><?php echo htmlspecialchars($row['nome_secretaria']); ?></td>
                <td>
                    <div class="btn-group" style="display: flex; gap: 0.5rem;" role="group">
                        <a href="index.php?controller=agendamentos&action=edit&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" style="background-color: #7d5b8c; color: white; border: none;">Editar</a>
                        <a href="index.php?controller=agendamentos&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" style="background-color: #7d5b8c; color: white; border: none;" >Deletar</a>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'app/views/footer.php'; ?>
