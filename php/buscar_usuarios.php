<?php
include('conexao.php');

$result = $mysqli->query("SELECT id, nome, email FROM usuarios");

$usuarios = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    $result->free();
} else {
    http_response_code(500);
    echo json_encode(["erro" => "Erro na consulta: " . $mysqli->error]);
    exit;
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($usuarios);
?>
