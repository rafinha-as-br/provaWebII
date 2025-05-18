<?php
session_start();

$erro = '';
if (isset($_SESSION['erro_login'])) {
    $erro = $_SESSION['erro_login'];
    unset($_SESSION['erro_login']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuário</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/validacao.js"></script>

</head>
<body>
    <?php if ($erro): ?>
        <p style="color:red;"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form action="php/login.php" method="post">
        <div class="principal">
            <div class="principalTitle bg-secondary text-white p-2 rounded border border-light">
                <h3 class="m-0 fs-3">Login do Usuário</h3>
            </div>

            <div class="formularioLogin mt-3">
                <div class="mb-3">
                    <label for="email" class="form-label text-white">E-mail</label>
                    <input type="email" class="form-control bg-dark text-white border border-light" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label text-white">Senha</label>
                    <input type="password" class="form-control bg-dark text-white border border-light" id="senha" name="senha" required>
                </div>
            </div>

            <div class="buttonsClass d-flex flex-column gap-2 mb-3">
                <button type="submit" id="entrarButton" class="btn btn-outline-light">Entrar</button>
                <button type="button" id="cadastroButton" class="btn btn-outline-light" onclick="window.location.href='cadastro.php'">Não possuo cadastro</button>
            </div>
        </div>
    </form>
</body>
</html>
