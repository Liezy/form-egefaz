<?php 


require_once "./conexao.php";

// Consulta SQL para obter os tipos de eventos
$sql = "SELECT id_tipo_evento, nome FROM tipo_eventos";
$result = $conn->query($sql);

// Verificar se há resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["id_tipo_evento"] . '">' . $row["nome"] . '</option>';
    }
} else {
    echo '<option value="">Nenhum tipo de evento encontrado</option>';
}

// Fechar conexão (se necessário)
$conn->close();


?>