<?php
include('conexao.php');

$result = $mysqli->query("SELECT * FROM usuarios where 1=1");

if ($result) {
    echo "<table border='1'>";
    echo "<thead><tr><th>ID</th><th>Nome</th><th>Email</th></tr></thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

    $result->free();
} else {
    echo "Erro na consulta: " . $mysqli->error;
}

$mysqli->close();

?>