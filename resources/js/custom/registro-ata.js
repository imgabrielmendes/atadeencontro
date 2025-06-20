    const btnIniciarAta = document.getElementById("btn-iniciarAta");

    if (btnIniciarAta) {
        btnIniciarAta.addEventListener("click", registrarAta);
    }

    function registrarAta() {
        //const form = document.getElementById("form-ata");
        const form = $("form-ata");

        const formData = new FormData(form);

        if (!formData.get('titulo')) {
            alert("Preencha o título da ata.");
            return;
        }

        var tituloAta =$("#input-titulo-ata").val();
        var LocalAta =$("#select-local-ata").val();
        var dthrInicioAta =$("#date-select-inicio-ata").val();
        var tempoEstimadoAta =$("#input-tempoestimado-ata").val();
        var SetorAta =$("#select-setor-ata").val();
        var LocalAta =$("#select-local-ata").val();
        var ParticipantesAta =$("#select-participate-ata").val();
        var DescricaoAta =$("#input-descricao-ata").val();

        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            url: '/registrarata',
            method: 'POST',
            data: {
            tituloAta:            tituloAta,
            LocalAta:             LocalAta,
            dthrInicioAta:        dthrInicioAta,
            tempoEstimadoAta:     tempoEstimadoAta,
            SetorAta:             SetorAta,
            LocalAta:             LocalAta,
            ParticipantesAta:     ParticipantesAta,
            DescricaoAta:         DescricaoAta
            },
            xhrFields: {
                withCredentials: true
            },
            success: function (response) {

            },
            error: function (xhr, status, error) {

            }
        });

    }
