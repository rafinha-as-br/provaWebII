<?php

include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $mysqli->real_escape_string(trim($_POST['nome']));
    $email = $mysqli->real_escape_string(trim($_POST['email']));

    if (!empty($nome) && !empty($email)) {
        $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

        if ($mysqli->query($sql)) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $mysqli->error;
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

$mysqli->close();

?>
