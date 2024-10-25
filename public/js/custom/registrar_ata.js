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
        
        var facilitadores = Array.from(document.getElementById("selecionandofacilitador").selectedOptions).map(option => option.value);
        
        var tema = document.getElementById("temaprincipal").value;

        if (!data || !hora_inicio || !hora_final || !objetivoSelecionado || !local || !facilitadores.length || !tema) {
            console.error('Por favor, preencha todos os campos.');
            return;
        }

        console.log(
            data, 
            hora_inicio, 
            hora_final, 
            objetivoSelecionado, 
            local, 
            facilitadores, 
            tema
        );

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
            success: function (response) {

                window.location.href = `/ata/${response.id}`;

                console.log("(2) Deu bom! AJAX está enviando");
                console.log("Resposta do servidor:", response);
                
            },
            error: function (xhr, status, error) {
                console.error('Erro na solicitação AJAX:', error);
                console.error('Status:', status);
                console.error('Response:', xhr.responseText);
            }
        });        
    }
});
