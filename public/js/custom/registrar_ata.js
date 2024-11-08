document.addEventListener("DOMContentLoaded", function() {
    var btnsalvar = document.getElementById("botaoregistrar");
    btnsalvar.addEventListener("click", function() {
        registrarata();
    });

    function registrarata() {
        var data = document.getElementById("datainicio").value;
        var hora_inicio = document.getElementById("horainicio").value;
        var hora_final = document.getElementById("horaterm").value;

        var objetivo = document.querySelectorAll("input[name='objetivo']");
        var objetivoSelecionado = null;

        for (var op = 0; op < objetivo.length; op++) {
            if (objetivo[op].checked) {
                objetivoSelecionado = objetivo[op].value;
                break;
            }
        }

        var local = document.getElementById("pegarlocal").value;

        var alpineComponent = document.querySelector("[x-data]");
        var facilitadores = alpineComponent.__x.selectedOptions.map(opt => opt.id);

        var tema = document.getElementById("temaprincipal").value;

        if (!data || !hora_inicio || !hora_final || !objetivoSelecionado || !local || !tema) {
            console.error('Por favor, preencha todos os campos.');
            return;
        }

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
                facilitadores: JSON.stringify(facilitadores),
                tema: tema,
                _token: token
            },
            success: function(response) {
                window.location.href = `/ata/${response.id}`;
            },
            error: function(xhr, status, error) {
                console.error('Erro na solicitação AJAX:', error);
                console.error('Status:', status);
                console.error('Response:', xhr.responseText);
            }
        });
    }
});
