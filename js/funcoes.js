function selectAction() {
    let selectTipoEvento = document.getElementById("tipo_evento");
    let selectEventosAbertos = document.getElementById("eventos_abertos");
    let valor = selectTipoEvento.value;

    fetch("eventos_abertos.php?tipo_evento=" + valor)
        .then(response => {
            return response.text();
        })
        .then(texto => {
            selectEventosAbertos.innerHTML = texto;
        });

    
}

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