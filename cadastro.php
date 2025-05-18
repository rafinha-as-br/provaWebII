<?php
session_start();
include 'php/cadastrar_usuario.php';
if (isset($_SESSION['mensagem_erro'])) {
    echo "<div style='color: red; background: #fdd; padding: 10px; border: 1px solid red; margin-bottom: 15px;'>"
        . htmlspecialchars($_SESSION['mensagem_erro']) . "</div>";
    unset($_SESSION['mensagem_erro']);
}
if (isset($_SESSION['mensagem_sucesso'])) {
    echo "<div style='color: green; background: #dfd; padding: 10px; border: 1px solid green; margin-bottom: 15px;'>"
        . htmlspecialchars($_SESSION['mensagem_sucesso']) . "</div>";
    unset($_SESSION['mensagem_sucesso']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro de usuário</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="principal">
        <div class="principalTitle bg-secondary text-white p-2 rounded border border-light">
            <h3 class="m-0 fs-3">Cadastro de Usuário</h3>
        </div>

        <!-- FORM COMEÇA AQUI -->
        <form action="" method="POST" class="formularioLogin mt-3 justify-content-center">

            <div class="mb-3">
                <label for="nome" class="form-label text-white">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control bg-dark text-white border border-light" required />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-white">E-mail</label>
                <input type="email" name="email" id="email" class="form-control bg-dark text-white border border-light" required />
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label text-white">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control bg-dark text-white border border-light" required />
            </div>

            <div class="buttonsClass d-flex flex-column gap-2 mb-3">
                <button type="submit" class="btn btn-outline-light">Cadastrar-se</button>
                <button type="button" class="btn btn-outline-light" onclick="window.location.href='login.php'">Já possuo cadastro!</button>
            </div>

        </form>
        <!-- FORM TERMINA AQUI -->

    </div>

</body>

</html>
