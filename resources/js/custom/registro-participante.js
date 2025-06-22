import $ from 'jquery';

const btnRegistrarParticipantes = document.getElementById("btn-registro-participante");

if (btnRegistrarParticipantes) {
    btnRegistrarParticipantes.addEventListener("click", registrarParticipantes);
}

function registrarParticipantes() {
    const form = document.getElementById("form-ata");
    const formData = new FormData(form);

    const ataId                    = $("#ata_id").val();
    const participantesAta         = $("#select-participante-ata").val();
    
    if (!validarCampo(participantesAta, "Participantes ausentes", "Você não colocou um participante para a sua reunião")) return;

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url: '/registrarparticipantes',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            participantesAta:  participantesAta,
            ataId:             ataId
        },
        xhrFields: {
            withCredentials: true
        },
        success: function (response) {
            Swal.fire({
                icon: "success",
                title: "Ata registrada",
                text: "A ata foi registrada com sucesso!"
            }).then(() => {
                window.location.href = `/deliberacoes/${response.id}`;
            });
        },
        error: function (xhr, status, error) {
            Swal.fire({
                icon: "error",
                title: "Erro ao colocar participantes",
                text: "Houve um problema ao tentar inserir participantes novos a ata."
            });
            console.error("Erro:", error);
        }
    });
}

function validarCampo(valor, titulo, texto) {
    if (!valor) {
        Swal.fire({
            icon: "error",
            title: titulo,
            text: texto
        });
        return false;
    }
    return true;
}
