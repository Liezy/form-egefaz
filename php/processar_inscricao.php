<?php 
require_once "conexao.php";

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Coleta os dados do formulário
    $tipo_evento = $_POST["tipo_evento"];
    $eventos_abertos = $_POST["eventos_abertos"];
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cargo = $_POST["cargo"];
    $lotacao = $_POST["lotacao"];

    // Prepara e executa a consulta SQL para inserir os dados na tabela do banco de dados
    $sql = "INSERT INTO tabela_usuarios (tipo_evento, eventos_abertos, cpf, nome, email, telefone, cargo, lotacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $tipo_evento, $eventos_abertos, $cpf, $nome, $email, $telefone, $cargo, $lotacao);
    
    if ($stmt->execute()) {
        echo "Inscrição realizada com sucesso!";
    } else {
        echo "Erro ao processar inscrição: " . $conn->error;
    }
    
    // Fecha a conexão com o banco de dados
    $conn->close();
}


?>