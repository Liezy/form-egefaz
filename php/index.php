<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

            <form action="index.php" method="POST" class="formulario">

                <p for="tipo_evento">Tipo de evento</p>
                <select name="tipo_evento" id="tipo_evento" class="info" onchange="mostrarCampos()">
                    <option value="selecione">Selecione o tipo de evento</option>
                    <option value="curso_presencial">Curso Presencial</option>
                    <option value="curso_ead">Curso EaD</option>
                    <option value="seminario">Seminário</option>
                    <option value="workshop">Workshop</option>
                    <option value="palestra">Palestra</option>
                    <option value="treinamento">Treinamento</option>
                </select>

                <label style="display: none;"  for="eventos_abertos">Eventos Abertos</label>
                <select style="display: none;" name="eventos_abertos" id="eventos_abertos" class="info">

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

    <script>

        function preencherCampos() {
            var cpfInput = document.getElementById("cpf").value;
            var nomeInput = document.getElementById("nome");
            var emailInput = document.getElementById("email");
            var telefoneInput = document.getElementById("telefone");
            var cargoInput = document.getElementById("cargo");

            //verificar se cpf foi preenchido
            if (cpfInput.trim() !== '') {
                //cria um objeto XMLHttpRequest para fazer a solicitação ao servidor
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Se a solicitação for bem-sucedida, preenche os campos com as informações correspondentes
                        var resposta = JSON.parse(this.responseText);
                        nomeInput.value = resposta.nome;
                        emailInput.value = resposta.email;
                        telefoneInput.value = resposta.telefone;
                        cargoInput.value = resposta.cargo;
                    }
                };
                // Abre uma solicitação GET para obter as informações correspondentes ao CPF digitado
                xhttp.open("GET", "obter_informacoes.php?cpf=" + cpfInput, true);
                xhttp.send();
            } else {
                // Se o campo "cpf" estiver vazio, limpa os campos
                nomeInput.value = '';
                emailInput.value = '';
                telefoneInput.value = '';
                cargoInput.value = '';
            }
        }

        function limparCampos() {
            var tipoEvento = document.getElementById("tipo_evento").value;
            var campoCursoPresencial = ["cpf", "nome", "email", "telefone"];
            var campoCursoEad = ["cpf", "nome", "email", "telefone"];
            var campoSeminario = ["cpf", "nome", "email", "telefone", "cargo", "lotacao"];
            var campoWorkshop = ["cpf", "nome", "email", "telefone", "cargo"];
            var campoPalesta = ["cpf", "nome", "email", "telefone", "cargo"];
            var campoTreinamento = ["cpf", "nome", "email", "telefone", "cargo"];

            campoCursoEad.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoSeminario.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoWorkshop.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoPalesta.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoTreinamento.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoCursoPresencial.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });
        }

        function mostrarBotao() {
            var botao = document.getElementById("btn_enviar");

            botao.style.display = "flex";
        }

        function mostrarCampos() {
            var tipoEvento = document.getElementById("tipo_evento").value;
            var campoCursoPresencial = ["cpf", "nome", "email", "telefone"];
            var campoCursoEad = ["cpf", "nome", "email", "telefone"];
            var campoSeminario = ["cpf", "nome", "email", "telefone", "cargo", "lotacao"];
            var campoWorkshop = ["cpf", "nome", "email", "telefone", "cargo"];
            var campoPalesta = ["cpf", "nome", "email", "telefone", "cargo"];
            var campoTreinamento = ["cpf", "nome", "email", "telefone", "cargo"];
            var botao = document.getElementById("btn_enviar");
            var campoEventosAbertos = document.getElementById("eventos_abertos");
            

            if (tipoEvento === "selecione") {
                // Esconde todas as labels
                document.querySelectorAll('label').forEach(function(label) {
                    label.style.display = "none";
                });

                campoCursoPresencial.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });
                
                campoCursoEad.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoSeminario.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoWorkshop.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoPalesta.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoTreinamento.forEach(function(campo) {
                    document.getElementById(campo).style.display = "none";
                });

                campoEventosAbertos.style.display = "none";

                botao.style.display = "none";

            } else if (tipoEvento) {

                // Esconde todas as labels
                document.querySelectorAll('label').forEach(function(label) {
                    label.style.display = "block";
                });

                campoCursoPresencial.forEach(function(campo) {
                    document.getElementById(campo).style.display = "block";
                });
                
                campoCursoEad.forEach(function(campo) {
                    document.getElementById(campo).style.display = "block";
                });

                campoSeminario.forEach(function(campo) {
                    document.getElementById(campo).style.display = "block";
                });

                campoWorkshop.forEach(function(campo) {
                    document.getElementById(campo).style.display = "block";
                });

                campoPalesta.forEach(function(campo) {
                    document.getElementById(campo).style.display = "block";
                });

                campoTreinamento.forEach(function(campo) {
                    document.getElementById(campo).style.display = "block";
                });

                campoEventosAbertos.style.display = "block";
                
                mostrarBotao();

            } else {

                var botao = document.getElementById("btn_enviar");

                botao.style.display = "none";

                limparCampos();


            }
        }



    </script>
</body>

</html>