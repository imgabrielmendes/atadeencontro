import $ from 'jquery';


const btnIniciarAta = document.getElementById("btn-iniciarAta");

if (btnIniciarAta) {
    btnIniciarAta.addEventListener("click", registrarAta);
}

function registrarAta() {
    const form = document.getElementById("form-ata");
    const formData = new FormData(form);

    const tituloAta         = $("#input-titulo-ata").val();
    const localAta          = $("#select-local-ata").val();
    const objetivoAta       = $("#select-objetivo-ata").val();
    const dthrInicioAta     = $("#date-select-inicio-ata").val();
    const tempoEstimadoAta  = $("#input-tempoestimado-ata").val();
    const setorAta          = $("#select-setor-ata").val();
    const participantesAta  = $("#select-participante-ata").val();
    const descricaoAta      = $("#input-descricao-ata").val();

    if (!validarCampo(tituloAta, "Título ausente", "Você não colocou um título para a sua reunião")) return;
    if (!validarCampo(localAta, "Local ausente", "Você não selecionou um local para a sua reunião")) return;
    if (!validarCampo(dthrInicioAta, "Data/Hora ausente", "Você não selecionou a data e hora da reunião")) return;
    if (!validarCampo(tempoEstimadoAta, "Tempo Estimado ausente", "Você não informou o tempo estimado da reunião")) return;
    if (!validarCampo(setorAta, "Setor ausente", "Você não selecionou o setor da reunião")) return;
    if (!validarCampo(objetivoAta, "Objetivo ausente", "Você não selecionou o objetivo da reunião")) return;
    if (!validarCampo(descricaoAta, "Descrição ausente", "Você não descreveu o objetivo da reunião")) return;

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url: '/registrarata',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        data: {
            tituloAta:         tituloAta,
            localAta:          localAta,
            objetivoAta:       objetivoAta,
            dthrInicioAta:     dthrInicioAta,
            tempoEstimadoAta:  tempoEstimadoAta,
            setorAta:          setorAta,
            participantesAta:  participantesAta,
            descricaoAta:      descricaoAta
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
                window.location.href = `/ata/${response.id}`;
            });



        },
        error: function (xhr, status, error) {
            Swal.fire({
                icon: "error",
                title: "Erro ao registrar",
                text: "Houve um problema ao tentar registrar a ata."
            });
            console.error("Erro:", error);
        }
    });
}

function validarCampo(valor, titulo, texto) {
    if (!valor || valor.trim() === "") {
        Swal.fire({
            icon: "error",
            title: titulo,
            text: texto
        });
        return false;
    }
    return true;
}
