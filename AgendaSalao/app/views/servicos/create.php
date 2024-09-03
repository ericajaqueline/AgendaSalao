<?php include 'app/views/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center my-4">Cadastrar Serviço</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
    <form method="POST" action="index.php?controller=servicos&action=create">
        <div class="form-group">
            <label for="nome_servico">Nome do Serviço:</label>
            <input type="text" class="form-control" id="nome_servico" name="nome_servico" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao"></textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="text" class="form-control" id="preco" name="preco" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="salvar" style="background-color: #7d5b8c; color: white; border: none;">Cadastrar</button>
    </form>
</div>


<?php include 'app/views/footer.php'; ?>