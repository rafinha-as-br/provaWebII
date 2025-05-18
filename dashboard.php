<?php
session_start();
include 'php/conexao.php';

$result = $mysqli->query("SELECT nome, email FROM usuarios");


// Se o usuário não estiver logado, redireciona para login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$nomeUsuario = $_SESSION['usuario_nome'];

$usuarios = [];  // array vazio para armazenar usuários

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;  // adiciona cada usuário ao array
    }
    $result->free();  // libera a memória da consulta
}

$mysqli->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/estilo.css" />
</head>
<body>
    <div class="principal">
        <div class="principalTitle">
            <h3>Dashboard</h3>
            <h4>Bem-vindo, <?= htmlspecialchars($nomeUsuario) ?></h4>
        </div>
        <div class="listaUsuarios">
            <h6>Lista de usuários</h6>
            <ul>
                <?php foreach ($usuarios as $usuario): ?>
                    <li><?= htmlspecialchars($usuario['nome']) ?> : <?= htmlspecialchars($usuario['email']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="buttonsClass">
            <button onclick="window.location.href='logout.php'">Deslogar</button>
        </div>
    </div>

    <script>
        function carregarUsuarios() {
        fetch('php/buscar_usuarios.php')
            .then(response => response.json())
            .then(data => {
                const lista = document.querySelector('.listaUsuarios ul');
                lista.innerHTML = ''; // limpa a lista

                data.forEach(usuario => {
                    const li = document.createElement('li');
                    li.textContent = `${usuario.nome} : ${usuario.email}`;
                    lista.appendChild(li);
                });
           })
            .catch(error => {
                console.error('Erro ao carregar usuários:', error);
            });
}

// Chama a função ao carregar a página
window.onload = carregarUsuarios;
</script>

    
</body>
</html>
