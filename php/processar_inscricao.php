<?php
// Conexão com o banco de dados
require_once "conexao.php";

// Dados do formulário
$tipo_evento = $_POST["tipo_evento"];
$eventos_abertos = $_POST["eventos_abertos"];
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$cargo = $_POST["cargo"];
$lotacao = $_POST["lotacao"];

// Verificar a quantidade máxima de inscrições para o evento
$sql_max_inscricoes = "SELECT qtd_max FROM eventos WHERE id_evento = ?";
$stmt_max_inscricoes = $conn->prepare($sql_max_inscricoes);
$stmt_max_inscricoes->bind_param("i", $eventos_abertos);
$stmt_max_inscricoes->execute();
$result_max_inscricoes = $stmt_max_inscricoes->get_result();
$row_max_inscricoes = $result_max_inscricoes->fetch_assoc();
$qtd_max_inscricoes = $row_max_inscricoes['qtd_max'];

// Verificar o número atual de inscrições para o evento
$sql_num_inscricoes = "SELECT COUNT(*) AS num_inscricoes FROM inscricoes WHERE id_evento = ?";
$stmt_num_inscricoes = $conn->prepare($sql_num_inscricoes);
$stmt_num_inscricoes->bind_param("i", $eventos_abertos);
$stmt_num_inscricoes->execute();
$result_num_inscricoes = $stmt_num_inscricoes->get_result();
$row_num_inscricoes = $result_num_inscricoes->fetch_assoc();
$num_inscricoes_atuais = $row_num_inscricoes['num_inscricoes'];

// Verificar se há vagas disponíveis
if ($num_inscricoes_atuais < $qtd_max_inscricoes) {
    // Inserir dados na tabela pessoas
    $sql_pessoas = "INSERT INTO pessoas (id_cargo, id_lotacao, cpf, nome, email, telefone) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_pessoas = $conn->prepare($sql_pessoas);
    $stmt_pessoas->bind_param("iissis", $cargo, $lotacao, $cpf, $nome, $email, $telefone);
    $stmt_pessoas->execute();

    // Verificar se a inserção foi bem-sucedida
    if ($stmt_pessoas->affected_rows > 0) {
        // Obtendo o ID da pessoa inserida
        $id_pessoa = $stmt_pessoas->insert_id;

        // Inserir dados na tabela inscricoes
        $sql_inscricoes = "INSERT INTO inscricoes (id_evento, id_pessoa) VALUES (?, ?)";
        $stmt_inscricoes = $conn->prepare($sql_inscricoes);
        $stmt_inscricoes->bind_param("ii", $eventos_abertos, $id_pessoa);
        $stmt_inscricoes->execute();

        // Verificar se a inserção foi bem-sucedida
        if ($stmt_inscricoes->affected_rows > 0) {
            echo "Inscrição realizada com sucesso!";
        } else {
            echo "Erro ao processar inscrição: " . $conn->error;
        }
    } else {
        echo "Erro ao processar inscrição: " . $conn->error;
    }
} else {
    echo "O evento atingiu o limite máximo de inscrições.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
