<?php include 'app/views/header.php'; ?>

    <div class="row justify-content-center">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-4">
            <h2 class="text-center">Login</h2>
            <form method="POST" action="index.php?controller=login&action=authenticate">
                
            <div class="form-group">
                    <label for="login">Login:</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Usuário" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block btn-light" name="entrar">Entrar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php include 'app/views/footer.php'; ?>