
document.addEventListener("DOMContentLoaded", function() {
    var textoprincipal = document.getElementById('btntextoregistrar');
    textoprincipal.addEventListener('click', function() {
        registrarTexto();
    });
});

function registrarTexto() {
    var caixadetexto = document.getElementById("caixadetexto").value.trim();
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    var urlParts = window.location.pathname.split('/');
    var ataId = urlParts[urlParts.length - 1];

    if (!caixadetexto) {
        mostrarAlerta("Problema!", "Você não informou um texto principal", "error");
        return;
    }

    $.ajax({
        url: '/registrartexto',
        method: 'POST',
        data: {
            caixadetexto: caixadetexto,
            id_ata: ataId,
            _token: token
        },
        success: function(response) {
            if (response.success) {

                document.getElementById("caixadetexto").value = response.caixadetexto;

                Swal.fire({
                    title: "Sucesso!",
                    text: "Texto principal registrado com sucesso",
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Atenção!",
                            text: "Deseja realmente continuar com a ata?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Continuar",
                            cancelButtonText: "Finalizar ata"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                console.log("Usuário escolheu continuar.");
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                console.log("Usuário escolheu cancelar.");
                                window.location.href = `/historico`;
                            }
                        });
                    }
                });
                

            } else {
                mostrarAlerta("Erro!", response.message || "Falha ao registrar o texto", "error");
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro na solicitação AJAX:', error);
            console.error('Response:', xhr.responseText);
            mostrarAlerta("Erro!", "Ocorreu um erro ao registrar o texto", "error");
        }
    });
}
