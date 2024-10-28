
var btnparticipantes = document.getElementById("btnparticipantes");

btnparticipantes.addEventListener('click', registrarParticipantes);

function registrarParticipantes() 
{

    var participantes = document.getElementById("participantesadicionados").value;

    console.log(participantes);

    $.ajax({
        url: '/insertParticipantes',
        method: 'POST',
        data: {
            participantes: participantes
        },
        success: function (response) {

            window.location.href = `/ata/deliberacoes/${response.id}`;
            console.log("Resposta do servidor:", response);
            
        },
        error: function (xhr, status, error) {
            console.error('Erro na solicitação AJAX:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
        }
    }); 

}