document.addEventListener("DOMContentLoaded", function() {
    var btnparticipantes = document.getElementById("btnparticipantes");
    btnparticipantes.addEventListener('click', function() {
        registrarParticipantes();
    });

    function registrarParticipantes() {
        var participantes = document.getElementById("participantesadicionados").value;
        var urlParts = window.location.pathname.split('/');
        var ataId = urlParts[urlParts.length - 1];

        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            url: '/registrarparticipantes',
            method: 'POST',
            data: {
                participantes: participantes,
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
