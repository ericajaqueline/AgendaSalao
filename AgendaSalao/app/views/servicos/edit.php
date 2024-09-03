<?php include 'app/views/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center my-4">Editar Serviço</h2>
            <div class="container">
                <form method="POST" action="index.php?controller=servicos&action=edit">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

                    <div class="form-group">
                        <label for="nome_servico">Nome do Serviço:</label>
                        <input type="text" class="form-control" id="nome_servico" name="nome_servico" value="<?php echo htmlspecialchars($row['nome_servico']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <textarea class="form-control" id="descricao" name="descricao" required><?php echo htmlspecialchars($row['descricao']); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="<?php echo htmlspecialchars($row['preco']); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="salvar" style="background-color: #7d5b8c; color: white; border: none;">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'app/views/footer.php'; ?>
