<?php
// Conexão com o banco de dados
$hostname = "localhost";
$bancodedados = "form-egefaz";
$usuario = "root";
$senha = "";

// Obtém o CPF enviado via parâmetro GET
$cpf = $_GET['cpf'];

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if($mysqli->connect_errno){
    echo "falha ao conectar:(" . $mysqli->connect_errno .")" . $mysqli->connect_error;
} else {
    // Consulta SQL para obter as informações correspondentes ao CPF fornecido
    $sql = "SELECT u.nome, u.email, u.telefone, c.nome_cargo FROM usuarios u INNER JOIN cargos c ON u.id_cargo = c.id_cargo WHERE u.cpf = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $stmt->bind_result($nome, $email, $telefone, $cargo_nome);
    $stmt->fetch();

    // Cria um array associativo com as informações
    $informacoes = array(
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone,
        'cargo' => $cargo_nome
    );

    // Retorna as informações como JSON
    echo json_encode($informacoes);

    // Fecha a conexão
    $mysqli->close();
}
?>
