<?php include 'app/views/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h2 class="text-center my-4">Editar Secretaria</h2>
<div class="container">

    <form method="POST" action="index.php?controller=secretarias&action=edit">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

        <div class="form-group">
            <label for="nome_secretaria">Nome da Secretaria:</label>
            <input type="text" class="form-control" id="nome_secretaria" name="nome_secretaria" value="<?php echo htmlspecialchars($row['nome_secretaria']); ?>" required>
        </div>

        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" id="login" name="login" value="<?php echo htmlspecialchars($row['login']); ?>" required>
        </div>

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" value="<?php echo htmlspecialchars($row['senha']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="salvar" style="background-color: #7d5b8c; color: white; border: none;">Atualizar</button>
    </form>
</div>


<?php include 'app/views/footer.php'; ?>