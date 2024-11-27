
function mostrarAlerta(titulo, mensagem, icone) {
    Swal.fire({
        title: titulo,
        text: mensagem,
        icon: icone
    });
}

document.addEventListener("DOMContentLoaded", function() {
    var btndeliberacao = document.getElementById("addItemButton");
    btndeliberacao.addEventListener('click', function() {
        registrarDeliberacao();
    });

    function registrarDeliberacao() {

        var selectedOptions = new Set();
        document.querySelectorAll("#options-container .cursor-pointer").forEach(function(optionElement) {
            if (optionElement.classList.contains('bg-gray-100')) {
                selectedOptions.add(optionElement.dataset.id);
            }
        });
        
        var urlParts = window.location.pathname.split('/');
        var ataId = urlParts[urlParts.length - 1];

        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var deliberacao = document.getElementById("deliberacoes").value;

        console.log({
            participantes: Array.from(selectedOptions),
        })

        $.ajax({
            url: '/registrardeliberacao',
            method: 'POST',
            data: {
                participantes: Array.from(selectedOptions),
                deliberacao: deliberacao,
                id_ata: ataId, 
                _token: token
            },
            success: function(response) {

                console.log("Deliberacoes Enviadas");
                console.log(response);
                
                mostrarAlerta("Problema!", "Você não informou um texto principal", "success");

                // location.reload();

            },
            error: function(xhr, status, error) {

                mostrarAlerta("Problema!", "Você não informou um texto principal", "error");


                console.error('Erro na solicitação AJAX:', error);
                console.error('Response:', xhr.responseText);
            }
        });
    }
});
