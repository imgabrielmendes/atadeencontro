document.addEventListener("DOMContentLoaded", function() {
    var btnparticipantes = document.getElementById("btnparticipantes");
    btnparticipantes.addEventListener('click', function() {
        registrarParticipantes();
    });

    function registrarParticipantes() {

        var selectedOptions = new Set();
        document.querySelectorAll("#options-container .cursor-pointer").forEach(function(optionElement) {
            if (optionElement.classList.contains('bg-gray-100')) {
                selectedOptions.add(optionElement.dataset.id);
            }
        });
        
        var urlParts = window.location.pathname.split('/');
        var ataId = urlParts[urlParts.length - 1];

        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        console.log({
            participantes: Array.from(selectedOptions),
        })

        $.ajax({
            url: '/registrarparticipantes',
            method: 'POST',
            data: {
                participantes: Array.from(selectedOptions),
                id_ata: ataId, 
                _token: token
            },
            success: function(response) {

                window.location.href = `/ata/deliberacoes/${response.id}`;
            },
            error: function(xhr, status, error) {
                console.error('Erro na solicitação AJAX:', error);
                console.error('Response:', xhr.responseText);
            }
        });
    }
});
