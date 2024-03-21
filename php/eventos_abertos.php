<?php 
require_once "./conexao.php";

$tipo_evento = $_GET['tipo_evento'];

// Consulta SQL para obter os tipos de eventos
$sql = "SELECT id_evento, nome_evento 
        FROM eventos
        WHERE id_tipo_evento = ?";

// Preparar a consulta
$stmt = $conn->prepare($sql);

// Vincular parâmetros e executar
$stmt->bind_param("i", $tipo_evento); // "i" indica que é um valor inteiro
$stmt->execute();

// Obter resultados
$result = $stmt->get_result();
echo '<option value="">Selecione o evento</option>';
// Verificar se há resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["id_evento"] . '">' . $row["nome_evento"] . '</option>';
    }
} else {
    echo '<option value="">Nenhum tipo de evento encontrado</option>';
}

// Fechar conexão (se necessário)
$stmt->close();
$conn->close();
?>