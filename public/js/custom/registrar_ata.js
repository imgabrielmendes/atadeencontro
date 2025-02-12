document.addEventListener("DOMContentLoaded", function () {
    var btnsalvar = document.getElementById("botaoregistrar");

    btnsalvar.addEventListener("click", function () {
        registrarata();
    });

    function registrarata() {
        var data = document.getElementById("datainicio").value;
        var hora_inicio = document.getElementById("horainicio").value;
        var hora_final = document.getElementById("horaterm").value;
        var objetivo = document.getElementById("objetivo-select").value; // Captura o valor selecionado de 'objetivo'
        var local = document.getElementById("pegarlocal").value;
        var tema = document.getElementById("temaprincipal").value;

        // Capturando os facilitadores selecionados no multiselect
        var facilitadores = $('#multiselect').val(); // Captura os IDs dos facilitadores selecionados

        console.log("Dados capturados:");
        console.log({
            data,
            horainicio: hora_inicio,
            horat: hora_final,
            objetivos: objetivo, // Adiciona o valor do objetivo
            local,
            facilitadores: facilitadores, // Envia facilitadores como um array
            tema
        });

        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            url: '/registrarata',
            method: 'POST',
            data: {
                data: data,
                horainicio: hora_inicio,
                horat: hora_final,
                objetivos: objetivo, // Envia o objetivo na requisição
                local: local,
                facilitadores: facilitadores, // Incluindo os facilitadores
                tema: tema,
                _token: token
            },
            xhrFields: {
                withCredentials: true
            },
            success: function (response) {
                // Caso a requisição seja bem-sucedida, redireciona para a página da ata
                window.location.href = `/ata/${response.id}`;
            },
            error: function (xhr, status, error) {
                console.error('Erro na solicitação AJAX:', error);
                console.error('Status:', status);
                console.error('Response:', xhr.responseText);
            }
        });
    }
});