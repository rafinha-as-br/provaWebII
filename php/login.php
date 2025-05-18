<?php
// Inicia a sessão
session_start();
include('conexao.php');

// Pega os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Evita SQL Injection (use prepared statements)
$stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se encontrou o usuário
if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    if(password_verify($senha,$usuario['senha'])){
          $_SESSION['usuario_id'] = $usuario['id'];
          $_SESSION['usuario_nome'] = $usuario['nome'];
    }
 
    // Libera recursos antes de redirecionar
    $stmt->close();
    $mysqli->close();
    // Redireciona para área logada
    header("Location: ../dashboard.php");
    exit();
} else {
    $_SESSION['erro_login'] = "E-mail ou senha incorretos.";
    // Libera recursos antes de redirecionar
    $stmt->close();
    $mysqli->close();
    header("Location: ../login.php");
    exit();
}
?>
