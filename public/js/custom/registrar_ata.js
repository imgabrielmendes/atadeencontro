document.addEventListener("DOMContentLoaded", function () {
    var btnsalvar = document.getElementById("botaoregistrar");

    btnsalvar.addEventListener("click", function () {
        registrarata();
    });

    function registrarata() {

        var data = document.getElementById("datainicio").value;
        var hora_inicio = document.getElementById("horainicio").value;
        var hora_final = document.getElementById("horaterm").value;

        var objetivo = document.querySelector("input[name='objetivo']:checked");
        var objetivoSelecionado = objetivo ? objetivo.value : null;

        var local = document.getElementById("pegarlocal").value;
        var tema = document.getElementById("temaprincipal").value;

        var selectedOptions = new Set();
        document.querySelectorAll("#options-container .cursor-pointer").forEach(function(optionElement) {
            if (optionElement.classList.contains('bg-gray-100')) {
                selectedOptions.add(optionElement.dataset.id);
            }
        });

        if (!data || !hora_inicio || !hora_final || !objetivoSelecionado || !local || !tema) {
            alert('Por favor, preencha todos os campos obrigatórios.');
            return;
        }

        console.log("Dados capturados:");

        console.log({
            data,
            horainicio: hora_inicio,
            horat: hora_final,
            objetivos: objetivoSelecionado,
            local,
            facilitadores: Array.from(selectedOptions),
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
                objetivos: objetivoSelecionado,
                local: local,
                facilitadores: Array.from(selectedOptions),
                tema: tema,
                _token: token
            },
            success: function (response) {
                // alert('Ata registrada com sucesso!');
                window.location.href = `/ata/${response.id}`;
            },
            error: function (xhr, status, error) {
                // alert('Ocorreu um erro ao registrar a ata. Por favor, tente novamente.');
                console.error('Erro na solicitação AJAX:', error);
                console.error('Status:', status);
                console.error('Response:', xhr.responseText);
            }
        });
    }
});
