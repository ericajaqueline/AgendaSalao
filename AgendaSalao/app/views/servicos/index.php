<?php include 'app/views/header.php'; ?>

<div class="row justify-content-center">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-mt-4">
    <h2 class="mb-3">Listar Serviços</h2>

    <div class="mb-3">
        <button type="submit" class="btn" style="background-color: #7d5b8c; color: white; border: none;">
            <a href="index.php?controller=servicos&action=create" style="color: white;">Cadastrar Serviço</a>
        </button>
    </div>

        <form method="get" action="index.php" class="mb-4">
        <input type="hidden" name="controller" value="servicos">
        <input type="hidden" name="action" value="index">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar..." value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
            <div class="input-group-append">
                <button type="submit" class="btn" style="background-color: #7d5b8c; color: white; border: none;">Buscar</button>
            </div>
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="text-align: center;">Nome do Serviço</th>
                <th style="text-align: center;">Descrição</th>
                <th style="text-align: center;">Preço</th>
                <th style="text-align: center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nome_servico']); ?></td>
                <td><?php echo htmlspecialchars($row['descricao']); ?></td>
                <td><?php echo htmlspecialchars($row['preco']); ?></td>
                <td>
                <div class="btn-group" style="display: flex; gap: 0.5rem;" role="group">
                    <a href="index.php?controller=servicos&action=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" style="background-color: #7d5b8c; color: white; border: none;">Editar</a>
                    <a href="index.php?controller=servicos&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" style="background-color: #7d5b8c; color: white; border: none;" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'app/views/footer.php'; ?>