function mostrarAlerta(titulo, mensagem, icone) {
    Swal.fire({
        title: titulo,
        text: mensagem,
        icon: icone
    });
}

document.addEventListener("DOMContentLoaded", function() {
    var textoprincipal = document.getElementById('btntextoregistrar');
    textoprincipal.addEventListener('click', function() {
        registrartexto();
    });
});

function registrartexto() {
    console.log("Ok, a função de registrar texto foi puxada");

    var caixadetexto = document.getElementById("caixadetexto").value;

    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    var urlParts = window.location.pathname.split('/');
    var ataId = urlParts[urlParts.length - 1];

    if (caixadetexto === "") {
        mostrarAlerta("Problema!", "Você não informou um texto principal", "error");
    } 
        // else if (deliberadoresSelecionadosLabel.length === 0) {
        // mostrarAlerta("Problema!", "Preencha o espaço de deliberações", "error");} 
        
        else {
        mostrarAlerta("Perfeito!", "Seus Deliberadores foram registrados", "success");

        $.ajax({
            url: '/registrartexto',
            method: 'POST',
            data: {
                caixadetexto: caixadetexto,
                id_ata: ataId,
                _token: token
            },
            success: function() {
                
                console.log("AJAX DO TEXTO FOI PUXADO");

                setTimeout(function() {
                    // var url = 'paghistorico.php';
                    // window.location.href = url;
                }, 1500);
            }
        });
    }
}
