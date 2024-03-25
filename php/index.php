<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../src/css/reset.css">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/responsive.css">
    <title>Formulário de Inscrição</title>
</head>

<body>
    <main class="container">
        <div class="area-do-formulario">
            <div class="introducao">
                <h1 class="titulo">Formulário de Inscrição - Egefaz</h1>
            </div>

            <hr>

            <form action="processar_inscricao.php" method="POST" class="formulario">

                <p for="tipo_evento">Tipo de evento</p>
                <select name="tipo_evento" id="tipo_evento" class="info" onchange="mostrarCampos(); selectAction()">
                    <option value="selecione">Selecione o tipo de evento</option>
                    <?php include './tipos_eventos_select.php'; ?>
                </select>

                <label style="display: none;" for="eventos_abertos">Eventos Abertos</label>
                <select style="display: none;" name="eventos_abertos" id="eventos_abertos" class="info">
                    <option value="selecione">Selecione o evento</option>

                </select>

                <label style="display: none;"  for="cpf">CPF <span style="color: red;">*</span></label>
                <input style="display: none;" type="text" name="cpf" id="cpf" placeholder="Digite seu CPF (apenas números)" class="info" required oninput="preencherCampos()">
                
                <label style="display: none;"  for="nome" style="display: inline-block;">Nome Completo <span style="color: red;">*</span></label>
                <input style="display: none;" type="text" name="nome" id="nome" placeholder="Digite seu nome completo" class="info" required>

                <label style="display: none;"  for="email">Email <span style="color: red;">*</span></label>
                <input style="display: none;" type="email" name="email" id="email" placeholder="Digite seu email" class="info" required>
                
                <label style="display: none;"  for="telefone">Telefone <span style="color: red;">*</span></label>
                <input style="display: none;" type="text" name="telefone" id="telefone" placeholder="Digite seu telefone" class="info" required>
                
                <label style="display: none;"  for="cargo">Cargo</label>
                <input style="display: none;" type="text" name="cargo" id="cargo" placeholder="Digite seu cargo" class="info">

                <label style="display: none;"  for="lotacao">lotação</label>
                <input style="display: none;" type="text" name="lotacao" id="lotacao" placeholder="Digite sua lotação" class="info">

                <div style="display: none;" class="area-botao" id="btn_enviar">
                    <input type="submit" value="Enviar" class="btn">
                </div>
            </form>
        </div>
    </main>

    <script src="../js/funcoes.js"></script>
</body>

</html>