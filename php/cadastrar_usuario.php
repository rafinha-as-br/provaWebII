<?php
session_start(); // importante para usar $_SESSION
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome  = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (!empty($nome) && !empty($email) && !empty($senha)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['mensagem_erro'] = "E-mail inválido.";
            header("Location: /provaWebII/cadastro.php");
            exit;
        }

        $check = $mysqli->prepare("SELECT id FROM usuarios WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $_SESSION['mensagem_erro'] = "E-mail já cadastrado.";
            $check->close();
            header("Location: /provaWebII/cadastro.php");
            exit;
        }

        $check->close();

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $mysqli->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $nome, $email, $senha_hash);
            if ($stmt->execute()) {
                $_SESSION['mensagem_sucesso'] = "Usuário cadastrado com sucesso!";
                $stmt->close();
                header("Location: /provaWebII/login.php");
                exit;
            } else {
                $_SESSION['mensagem_erro'] = "Erro ao cadastrar o usuário.";
               header("Location: /provaWebII/cadastro.php");
               exit;

            }
        } else {
            $_SESSION['mensagem_erro'] = "Erro na preparação da query.";
            header("Location: /provaWebII/cadastro.php");
            exit;
        }
    } else {
        $_SESSION['mensagem_erro'] = "Por favor, preencha todos os campos.";
        header("Location: /provaWebII/cadastro.php");
        exit;
    }
}

$mysqli->close();
?>
